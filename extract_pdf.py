import sys, os, json

pdf_path = r"C:\\Users\\brgul\\OneDrive\\Desktop\\Foodmate\\Project_23_-_T2_2026.pdf"

try:
    from PyPDF2 import PdfReader
except ImportError:
    print(json.dumps({"success": False, "message": "PyPDF2 not installed"}))
    sys.exit(1)

if not os.path.exists(pdf_path):
    print(json.dumps({"success": False, "message": "PDF not found"}))
    sys.exit(1)

reader = PdfReader(pdf_path)
text = []
for page in reader.pages:
    text.append(page.extract_text())
full_text = "\n".join(text)
print(full_text)
