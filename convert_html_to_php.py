import os
import glob

frontend_dir = r"c:\Users\brgul\OneDrive\Desktop\Foodmate\frontend"
html_files = glob.glob(os.path.join(frontend_dir, "*.html"))

for filepath in html_files:
    # Read the file
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Replace .html with .php for internal links
    content = content.replace('.html', '.php')
    
    # Write the modified content to a new .php file
    new_filepath = filepath[:-5] + ".php"
    with open(new_filepath, 'w', encoding='utf-8') as f:
        f.write(content)
        
    # Remove the old .html file
    os.remove(filepath)
    
print("Successfully converted all .html files to .php and updated internal links.")
