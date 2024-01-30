# text_extraction.py
from flask import Flask, render_template, request, jsonify, send_file
from text_extraction_logic import extract_highlighted_text_from_pdf
import os

app = Flask(__name__)

@app.route('/')
def extraction():
    return render_template('extraction.html')

@app.route('/extract_highlighted_text_from_pdf', methods=['POST'])  # Fix route name here
def extract_highlighted_text_from_pdf_route():
    try:
        uploaded_file = request.files['file']
        if uploaded_file.filename != '':
            temp_path = 'temp.pdf'
            uploaded_file.save(temp_path)

            output_txt_path = 'extracted_text.txt'
            extracted_text = extract_highlighted_text_from_pdf(temp_path, output_txt_path)

            os.remove(temp_path)

            return jsonify(success=True, output_txt_path=output_txt_path, extracted_text=extracted_text)
        else:
            return jsonify(success=False, error='No file provided')

    except Exception as e:
        return jsonify(success=False, error=str(e))

@app.route('/download_extracted_text')
def download_extracted_text():
    output_txt_path = 'extracted_text.txt'
    return send_file(output_txt_path, as_attachment=True)

if __name__ == '__main__':
    app.run(host='127.0.0.1', port=5001, debug=True)
