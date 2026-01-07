const nav = document.getElementById('main-menu');
const overlay = document.getElementById('overlay');

function toggleMenu() {
    nav.classList.toggle('active');
    if (nav.classList.contains('active')) {
        overlay.style.width = '100%';
    } else {
        overlay.style.width = '0';
    }
}