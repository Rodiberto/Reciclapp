document.addEventListener("DOMContentLoaded", function () {
    const toggleCurrentPassword = document.getElementById(
        "toggle-current-password"
    );
    const toggleNewPassword = document.getElementById("toggle-new-password");
    const toggleConfirmPassword = document.getElementById(
        "toggle-confirm-password"
    );

    const currentPasswordInput = document.getElementById(
        "update_password_current_password"
    );
    const newPasswordInput = document.getElementById(
        "update_password_password"
    );
    const confirmPasswordInput = document.getElementById(
        "update_password_password_confirmation"
    );

    if (toggleCurrentPassword) {
        toggleCurrentPassword.addEventListener("click", function () {
            const type =
                currentPasswordInput.getAttribute("type") === "password"
                    ? "text"
                    : "password";
            currentPasswordInput.setAttribute("type", type);
            document
                .getElementById("eye-icon-current")
                .classList.toggle("hidden", type === "text");
            document
                .getElementById("eye-slash-icon-current")
                .classList.toggle("hidden", type === "password");
        });
    }

    if (toggleNewPassword) {
        toggleNewPassword.addEventListener("click", function () {
            const type =
                newPasswordInput.getAttribute("type") === "password"
                    ? "text"
                    : "password";
            newPasswordInput.setAttribute("type", type);
            document
                .getElementById("eye-icon-new")
                .classList.toggle("hidden", type === "text");
            document
                .getElementById("eye-slash-icon-new")
                .classList.toggle("hidden", type === "password");
        });
    }

    if (toggleConfirmPassword) {
        toggleConfirmPassword.addEventListener("click", function () {
            const type =
                confirmPasswordInput.getAttribute("type") === "password"
                    ? "text"
                    : "password";
            confirmPasswordInput.setAttribute("type", type);
            document
                .getElementById("eye-icon-confirm-confirmation")
                .classList.toggle("hidden", type === "text");
            document
                .getElementById("eye-slash-icon-confirm-confirmation")
                .classList.toggle("hidden", type === "password");
        });
    }
});
