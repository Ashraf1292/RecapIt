from flask import Flask, render_template, request, jsonify
import json
import requests
import os

app = Flask(__name__)

def summarize_text(text):
    headers = {"Authorization": "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiYmQwMzI5ZGItZTg2Ni00ZGI0LWE3MDYtM2IyNTMwMDIwZDFhIiwidHlwZSI6ImFwaV90b2tlbiJ9.dDk55-7VgBGEYCBf4j8JhmiRHb0reEk9MA20cUioc4Y"}  # Replace 'YOUR_API_KEY' with your actual API key
    url = "https://api.edenai.run/v2/text/summarize"
    payload = {"providers": "microsoft,connexun", "language": "en", "text": text, "max_characters": 500}

    response = requests.post(url, json=payload, headers=headers)

    if response.status_code == 200:
        result = json.loads(response.text)
        return result['microsoft']['result']  # Change provider as needed
    else:
        print(f"Error: {response.status_code} - {response.text}")
        return None

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/summarize', methods=['POST'])
def summarize():
    try:
        uploaded_file = request.files['file']
        if uploaded_file.filename != '':
            temp_path = 'temp.txt'
            uploaded_file.save(temp_path)

            with open(temp_path, 'r', encoding='utf-8') as file:
                text = file.read()

            summarized_text = summarize_text(text)

            if summarized_text:
                # Get the original filename (without extension)
                original_filename, _ = os.path.splitext(uploaded_file.filename)

                # Construct the output filename with the same name as the input file
                output_path = f'{original_filename}_summarized.txt'
                
                with open(output_path, 'w', encoding='utf-8') as file:
                    file.write(summarized_text)

                os.remove(temp_path)
                return jsonify(success=True)
            else:
                return jsonify(success=False, error='Summarization failed')

    except Exception as e:
        return jsonify(success=False, error=str(e))

if __name__ == '__main__':
    app.run(debug=True)
