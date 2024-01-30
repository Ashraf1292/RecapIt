import fitz  # PyMuPDF

def extract_highlighted_text(pdf_path):
    doc = fitz.open(pdf_path)

    highlighted_text = []

    for page_num in range(doc.page_count):
        page = doc[page_num]
        annots = page.annots()

        for annot in annots:
            if annot.info.get("title") == "Highlight":
                highlighted_text.append(annot.info.get("subject"))

    doc.close()

    return highlighted_text

# Example usage
pdf_path = "E:/XAMPP/htdocs/RecapIt/flop/interface/lorem.pdf"
highlighted_text = extract_highlighted_text(pdf_path)
print("Highlighted Text:")
for text in highlighted_text:
    print(text)
