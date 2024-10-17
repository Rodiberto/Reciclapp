document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    function validateName() {
        const nameInput = document.getElementById("name");
        const nameError = document.getElementById("name-error");
        const nameRegex = /^[\p{L}\s]+$/u;

        if (!nameInput.value.trim()) {
            nameError.textContent = "El nombre es requerido.";
            return false;
        } else if (!nameRegex.test(nameInput.value)) {
            nameError.textContent = "El nombre solo debe contener letras.";
            return false;
        } else {
            nameError.textContent = "";
            return true;
        }
    }

    function validateDescription() {
        const descriptionInput = document.getElementById("description");
        const descriptionError = document.getElementById("description-error");
        const descriptionRegex = /^[\p{L}\s.,\-]+$/u;

        if (!descriptionInput.value.trim()) {
            descriptionError.textContent = "La descripción es requerida.";
            return false;
        } else if (!descriptionRegex.test(descriptionInput.value)) {
            descriptionError.textContent =
                "La descripción solo debe contener letras y algunos caracteres especiales.";
            return false;
        } else {
            descriptionError.textContent = "";
            return true;
        }
    }

    document.getElementById("name").addEventListener("input", validateName);
    document
        .getElementById("description")
        .addEventListener("input", validateDescription);

    form.addEventListener("submit", function (event) {
        if (!validateName() || !validateDescription()) {
            event.preventDefault();
        }
    });
});
