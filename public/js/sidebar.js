

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('collapse-btn').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        const icon = document.getElementById('collapse-icon');

        sidebar.classList.toggle('collapsed');

        if (sidebar.classList.contains('collapsed')) {
            icon.classList.remove('fa-arrow-left');
            icon.classList.add('fa-arrow-right');
        } else {
            icon.classList.remove('fa-arrow-right');
            icon.classList.add('fa-arrow-left');
        }
    });
});
