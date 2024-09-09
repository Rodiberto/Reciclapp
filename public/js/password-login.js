document.addEventListener("DOMContentLoaded", function () {
    const toggleLoginPassword = document.getElementById("toggle-login-password");
    const loginPasswordInput = document.getElementById("password");

    if (toggleLoginPassword) {
        toggleLoginPassword.addEventListener("click", function () {
            const type = loginPasswordInput.getAttribute("type") === "password" ? "text" : "password";
            loginPasswordInput.setAttribute("type", type);
            document.getElementById("eye-icon-login").classList.toggle("hidden", type === "text");
            document.getElementById("eye-slash-icon-login").classList.toggle("hidden", type === "password");
        });
    }
});