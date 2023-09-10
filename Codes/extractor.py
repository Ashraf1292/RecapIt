
import fitz  # PyMuPDF

# Open the PDF
doc = fitz.open('FilePath/File.pdf')

# Define the RGB values for your colors
PINK = (0.9686269760131836, 0.6000000238418579, 0.8196079730987549)
YELLOW = (1.0, 0.9411770105361938, 0.4000000059604645)
GREEN = (0.49019598960876465, 0.9411770105361938, 0.4000000059604645)
RED = (0.9215689897537231, 0.2862749993801117, 0.2862749993801117)

color_definitions = {"Pink": PINK, "Yellow": YELLOW, "Green": GREEN, "Red": RED}

# Loop through every page
for i in range(len(doc)):
    page = doc[i]
    annotations = page.annots()
    for annotation in annotations:
        if annotation.type[1] == 'Highlight':
            color = annotation.colors['stroke']  # Returns an RGB tuple
            if color in color_definitions.values():
                # Get the detailed structure of the page
                structure = page.get_text("dict")

                # Extract highlighted text line by line
                content = []
                if "blocks" in structure:  # Check if "blocks" is present in the structure
                    for block in structure["blocks"]:
                        if "lines" in block:  # Check if "lines" is present in the block
                            for line in block["lines"]:
                                for span in line["spans"]:
                                    r = fitz.Rect(span["bbox"])
                                    if r.intersects(annotation.rect):
                                        content.append(span["text"])

                content = " ".join(content)

                # Determine the color name
                for color_name, color_rgb in color_definitions.items():
                    if color == color_rgb:
                        # Save the content to a .txt file
                        txt_filename = f'File_Name_{color_name.lower()}.txt'
                        with open(txt_filename, 'a', encoding='utf-8') as txt_file:
                            txt_file.write(content + '\n')

# Close the PDF
doc.close()
