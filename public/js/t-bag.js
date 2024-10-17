document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    function validateName() {
        const nameInput = document.getElementById("name");
        const nameError = document.getElementById("name-error");
        const nameRegex = /^[\p{L}\s.,\-]+$/u;

        if (!nameInput.value.trim()) {
            nameError.textContent = "El nombre es requerido.";
            return false;
        } else if (!nameRegex.test(nameInput.value)) {
            nameError.textContent =
                "El nombre solo debe contener algunos caracteres especiales.";
            return false;
        } else {
            nameError.textContent = "";
            return true;
        }
    }

    document.getElementById("name").addEventListener("input", validateName);

    form.addEventListener("submit", function (event) {
        if (!validateName()) {
            event.preventDefault();
        }
    });
});
