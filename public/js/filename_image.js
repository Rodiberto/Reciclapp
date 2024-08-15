function updateFileName() {
    const input = document.getElementById('image');
    const fileNameSpan = document.getElementById('file-name-image');
    
    if (input.files.length > 0) {
        const fileName = input.files[0].name;
        fileNameSpan.textContent = fileName;
    } else {
        fileNameSpan.textContent = '';
    }
}