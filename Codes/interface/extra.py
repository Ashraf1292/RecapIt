import fitz  # PyMuPDF

def extract_highlighted_text(pdf_path):
    doc = fitz.open(pdf_path)

    highlighted_text = []

    for page_num in range(doc.page_count):
        page = doc[page_num]
        annotations = page.annots()

        for annot in annotations:
            print(f"Page {page_num + 1} - Annotation: {annot.info}")

            # Uncomment the line below to see the full annotation details
            # print(f"Full Annotation: {annot}")

            highlighted_text.append(annot.info.get('subject', ''))

    doc.close()
    return highlighted_text

# Example usage:
pdf_path = 'AI.pdf'
highlighted_text = extract_highlighted_text(pdf_path)

print("\nHighlighted Text:")
for text in highlighted_text:
    print(text)
