const input = document.getElementById('photo');
const fileNameDisplay = document.getElementById('file-name');

input.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        fileNameDisplay.textContent = file.name;
    } else {
        fileNameDisplay.textContent = '';
    }
});
