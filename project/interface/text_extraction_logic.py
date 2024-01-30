# text_extraction_logic.py
from typing import List, Tuple
import fitz  # install with 'pip install pymupdf'


def _parse_highlight(annot: fitz.Annot, wordlist: List[Tuple[float, float, float, float, str, int, int, int]]) -> str:
    points = annot.vertices
    quad_count = int(len(points) / 4)
    sentences = []
    for i in range(quad_count):
        # where the highlighted part is
        r = fitz.Quad(points[i * 4: i * 4 + 4]).rect

        words = [w for w in wordlist if fitz.Rect(w[:4]).intersects(r)]
        sentences.append(" ".join(w[4] for w in words))
    sentence = " ".join(sentences)
    return sentence


def extract_highlighted_text_from_pdf(pdf_path: str, output_txt_path: str) -> List[str]:
    doc = fitz.open(pdf_path)
    highlighted_text = []

    for page in doc:
        wordlist = page.get_text("words")  # list of words on the page
        wordlist.sort(key=lambda w: (w[3], w[0]))  # ascending y, then x

        annot = page.first_annot
        while annot:
            if annot.type[0] == 8:
                highlighted_text.append(_parse_highlight(annot, wordlist))
            annot = annot.next

    with open(output_txt_path, 'w', encoding='utf-8') as output_file:
        for text in highlighted_text:
            output_file.write(text + '\n')

    return highlighted_text
