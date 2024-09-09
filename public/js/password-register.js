document.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.getElementById("toggle-password");
    const togglePasswordConfirmation = document.getElementById(
        "toggle-password-confirmation"
    );
    const passwordInput = document.getElementById("password");
    const passwordConfirmationInput = document.getElementById(
        "password_confirmation"
    );

    if (togglePassword) {
        togglePassword.addEventListener("click", function () {
            const type =
                passwordInput.getAttribute("type") === "password"
                    ? "text"
                    : "password";
            passwordInput.setAttribute("type", type);
            document
                .getElementById("eye-icon-password")
                .classList.toggle("hidden");
            document
                .getElementById("eye-slash-icon-password")
                .classList.toggle("hidden");
        });
    }

    if (togglePasswordConfirmation) {
        togglePasswordConfirmation.addEventListener("click", function () {
            const type =
                passwordConfirmationInput.getAttribute("type") === "password"
                    ? "text"
                    : "password";
            passwordConfirmationInput.setAttribute("type", type);
            document
                .getElementById("eye-icon-confirmation")
                .classList.toggle("hidden");
            document
                .getElementById("eye-slash-icon-confirmation")
                .classList.toggle("hidden");
        });
    }
});
