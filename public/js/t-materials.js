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
                "La descripción solo debe contener algunos caracteres especiales.";
            return false;
        } else {
            descriptionError.textContent = "";
            return true;
        }
    }

    function validateCategory() {
        const categoryInput = document.getElementById("material_category_id");
        const categoryError = document.getElementById("category-error");

        if (!categoryInput.value) {
            categoryError.textContent = "La categoría es requerida.";
            return false;
        } else {
            categoryError.textContent = "";
            return true;
        }
    }

    function validateWeight() {
        const weightInput = document.getElementById("weight");
        const weightError = document.getElementById("weight-error");
        const weightRegex = /^\d+(\.\d{1,2})?$/;

        if (!weightInput.value.trim()) {
            weightError.textContent =
                "El peso es requerido y debe ser numeros positivos.";
            return false;
        } else if (!weightRegex.test(weightInput.value)) {
            weightError.textContent =
                "El peso debe ser un número positivo válido (hasta 2 decimales).";
            return false;
        } else {
            weightError.textContent = "";
            return true;
        }
    }

    function validateValue() {
        const valueInput = document.getElementById("value");
        const valueError = document.getElementById("value-error");
        const valueRegex = /^\d+(\.\d{1,2})?$/;

        if (!valueInput.value.trim()) {
            valueError.textContent =
                "El valor es requerido y debe ser numeros positivos.";
            return false;
        } else if (!valueRegex.test(valueInput.value)) {
            valueError.textContent =
                "El valor debe ser un número positivo válido (hasta 2 decimales).";
            return false;
        } else {
            valueError.textContent = "";
            return true;
        }
    }

    function validateImage() {
        const imageInput = document.getElementById("image");
        const imageError = document.getElementById("image-error");

        if (!imageInput.value.trim()) {
            imageError.textContent = "La imagen es requerida.";
            return false;
        } else {
            imageError.textContent = "";
            return true;
        }
    }

    function validateCode() {
        const varCodeInput = document.getElementById("code");
        const varCodeError = document.getElementById("code-error");

        if (!varCodeInput.value.trim()) {
            varCodeError.textContent = "El código es requerido.";
            return false;
        }

        const varCodeRegex = /^[a-zA-Z0-9]+$/;
        if (!varCodeRegex.test(varCodeInput.value)) {
            varCodeError.textContent =
                "El código solo puede contener letras y números.";
            return false;
        }
        //
        if (varCodeInput.value.length > 20) {
            varCodeError.textContent =
                "El código no debe exceder los 20 caracteres.";
            return false;
        }

        varCodeError.textContent = "";
        return true;
    }

    document.getElementById("name").addEventListener("input", validateName);
    document
        .getElementById("description")
        .addEventListener("input", validateDescription);
    document
        .getElementById("material_category_id")
        .addEventListener("change", validateCategory);
    document.getElementById("weight").addEventListener("input", validateWeight);
    document.getElementById("value").addEventListener("input", validateValue);
    document.getElementById("image").addEventListener("change", validateImage);
    document.getElementById("code").addEventListener("input", validateCode);

    form.addEventListener("submit", function (event) {
        if (
            !validateName() ||
            !validateDescription() ||
            !validateCategory() ||
            !validateWeight() ||
            !validateValue() ||
            !validateImage() ||
            !validateCode()
        ) {
            event.preventDefault();
        }
    });
});
