import PyPDF2
import sys

def extract_text(pdf_path, output_path):
    try:
        with open(pdf_path, 'rb') as file:
            pdf_reader = PyPDF2.PdfReader(file)
            text = "".join(page.extract_text() for page in pdf_reader.pages)
            
            with open(output_path, 'w', encoding='utf-8') as output_file:
                output_file.write(text)

        print("Extraction successful. Output saved to:", output_path)
    except Exception as e:
        print("Extraction failed. Error:", str(e))

# Check for the command-line argument
if len(sys.argv) < 2:
    print("Usage: python extract_text.py <pdf_file>")
else:
    pdf_file = sys.argv[1]
    output_file = "E:/XAMPP/htdocs/RecapIt/flop/" + pdf_file.replace('.pdf', '.txt')
    extract_text(pdf_file, output_file)
