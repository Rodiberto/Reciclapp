document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('collapse-btn').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('collapsed');
    });
});