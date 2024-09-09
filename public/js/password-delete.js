document.addEventListener("DOMContentLoaded", function () {
    const toggleDeletePassword = document.getElementById(
        "toggle-delete-password"
    );
    const deletePasswordInput = document.getElementById("password");

    if (toggleDeletePassword) {
        toggleDeletePassword.addEventListener("click", function () {
            const type =
                deletePasswordInput.getAttribute("type") === "password"
                    ? "text"
                    : "password";
            deletePasswordInput.setAttribute("type", type);
            document
                .getElementById("eye-icon-delete")
                .classList.toggle("hidden", type === "text");
            document
                .getElementById("eye-slash-icon-delete")
                .classList.toggle("hidden", type === "password");
        });
    }
});
