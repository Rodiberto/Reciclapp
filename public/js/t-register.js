document.addEventListener("DOMContentLoaded", function () {
    const nameInput = document.getElementById("name");
    const phoneInput = document.getElementById("phone");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const passwordConfirmationInput = document.getElementById(
        "password_confirmation"
    );

    const validateName = () => {
        const name = nameInput.value.trim();
        const regex = /^[\p{L}\s]+$/u;
        if (name === "" || !regex.test(name)) {
            document.getElementById("name-error").textContent =
                "Solo ingrese letras y espacios.";
        } else {
            document.getElementById("name-error").textContent = "";
        }
    };

    const validatePhone = () => {
        const phone = phoneInput.value.trim();
        const regex = /^[0-9]{10}$/;

        if (!regex.test(phone)) {
            document.getElementById("phone-error").textContent =
                "Solo números y debe tener solo 10 dígitos";
        } else {
            fetch("/validate-phone", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({ phone: phone }),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.exists) {
                        document.getElementById("phone-error").textContent =
                            "Este número de teléfono ya está registrado.";
                    } else {
                        document.getElementById("phone-error").textContent = "";
                    }
                });
        }
    };

    const validateEmail = () => {
        const email = emailInput.value.trim();
        const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

        if (!regex.test(email)) {
            document.getElementById("email-error").textContent =
                "Por favor, introduce un correo electrónico válido.";
        } else {
            fetch("/validate-email", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({ email: email }),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.exists) {
                        document.getElementById("email-error").textContent =
                            "Este correo ya está registrado.";
                    } else {
                        document.getElementById("email-error").textContent = "";
                    }
                });
        }
    };

    const validatePassword = () => {
        const password = passwordInput.value.trim();
        if (password.length < 8) {
            document.getElementById("password-error").textContent =
                "La contraseña debe tener al menos 8 caracteres.";
        } else {
            document.getElementById("password-error").textContent = "";
        }

        if (passwordConfirmationInput.value.trim() !== "") {
            validatePasswordConfirmation();
        }
    };

    const validatePasswordConfirmation = () => {
        const password = passwordInput.value.trim();
        const passwordConfirmation = passwordConfirmationInput.value.trim();

        if (passwordConfirmation === "") {
            document.getElementById("password_confirmation-error").textContent =
                "";
            return;
        }

        if (password !== passwordConfirmation) {
            document.getElementById("password_confirmation-error").textContent =
                "Las contraseñas no coinciden.";
        } else {
            document.getElementById("password_confirmation-error").textContent =
                "";
        }
    };

    nameInput.addEventListener("input", validateName);
    phoneInput.addEventListener("input", validatePhone);
    emailInput.addEventListener("input", validateEmail);
    passwordInput.addEventListener("input", validatePassword);
    passwordConfirmationInput.addEventListener(
        "input",
        validatePasswordConfirmation
    );
});
