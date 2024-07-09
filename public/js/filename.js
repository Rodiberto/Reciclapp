const input = document.getElementById('profile_photo_path');
const fileNameDisplay = document.getElementById('file-name');

input.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        fileNameDisplay.textContent = file.name;
    } else {
        fileNameDisplay.textContent = '';
    }
});