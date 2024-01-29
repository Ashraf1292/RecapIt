import fitz  # install with 'pip install pymupdf'
import json
import requests

def summarize_text(text):
    headers = {"Authorization": "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiYmQwMzI5ZGItZTg2Ni00ZGI0LWE3MDYtM2IyNTMwMDIwZDFhIiwidHlwZSI6ImFwaV90b2tlbiJ9.dDk55-7VgBGEYCBf4j8JhmiRHb0reEk9MA20cUioc4Y"}  # Replace 'YOUR_API_KEY' with your actual API key
    url = "https://api.edenai.run/v2/text/summarize"
    payload = {"providers": "microsoft,connexun", "language": "en", "text": text, "max_characters": 10000}

    response = requests.post(url, json=payload, headers=headers)

    if response.status_code == 200:
        result = json.loads(response.text)
        return result['microsoft']['result']  # Change provider as needed
    else:
        print(f"Error: {response.status_code} - {response.text}")
        return None

def main(filepath: str) -> None:
    doc = fitz.open(filepath)

    extracted_text = ""
    for page in doc:
        text = page.get_text("text")
        extracted_text += text

    # Summarize the extracted text
    summarized_text = summarize_text(extracted_text)

    # Save the summarized text to a .txt file
    if summarized_text:
        with open('summarized_text.txt', 'w', encoding='utf-8') as file:
            file.write(summarized_text)
        print("Summarized text saved to 'summarized_text.txt'")

if __name__ == "__main__":
    pdf_path = "OI.pdf"
    main(pdf_path)
