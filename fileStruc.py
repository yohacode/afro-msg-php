import os

# Folders and file extensions to ignore
EXCLUDED_FOLDERS = {"vendor", "node_modules", ".git", "__pycache__", ".idea", ".vscode", ".github", ".phpunit.cache"}
EXCLUDED_EXTENSIONS = {".log", ".zip", ".pyc", ".exe", ".bak", ".tmp", ".py"}

def should_exclude(path):
    # Check folders
    for folder in EXCLUDED_FOLDERS:
        if folder in path.split(os.sep):
            return True
    # Check file extensions
    if os.path.isfile(path):
        ext = os.path.splitext(path)[1].lower()
        if ext in EXCLUDED_EXTENSIONS:
            return True
    return False

def generate_structure(root_dir, prefix="", output_lines=None):
    try:
        entries = sorted(os.listdir(root_dir))
    except PermissionError:
        return  # skip unreadable directories

    entries = [e for e in entries if not should_exclude(os.path.join(root_dir, e))]

    for index, entry in enumerate(entries):
        path = os.path.join(root_dir, entry)
        connector = "└── " if index == len(entries) - 1 else "├── "
        line = prefix + connector + entry
        print(line)

        if output_lines is not None:
            output_lines.append(line)

        if os.path.isdir(path):
            extension = "    " if index == len(entries) - 1 else "│   "
            generate_structure(path, prefix + extension, output_lines)

if __name__ == "__main__":
    import sys

    target_dir = sys.argv[1] if len(sys.argv) > 1 else "."
    abs_path = os.path.abspath(target_dir)

    print(f"Project structure of: {abs_path}\n")

    output = [f"Project structure of: {abs_path}\n"]
    generate_structure(target_dir, output_lines=output)

    output_file = "project_structure.txt"
    with open(output_file, "w", encoding="utf-8") as f:
        f.write("\n".join(output))

    print(f"\nStructure saved to: {output_file}")
