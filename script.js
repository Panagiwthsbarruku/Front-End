document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const navUl = document.querySelector('nav ul'); // Αλλαγή εδώ

    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            navUl.classList.toggle('show'); // Αλλαγή εδώ
        });
    }
});
