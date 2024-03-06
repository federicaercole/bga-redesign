const toggle = document.querySelector('#toggle');
const nav = document.querySelector('.navigation');
const span = document.querySelector('#toggle span');
const icon = document.querySelector('#toggle svg path');

toggle.addEventListener('click', () => {
    if (nav.classList.contains('show-menu')) {
        toggle.setAttribute('aria-expanded', 'false');
        nav.classList.remove('show-menu');
        span.textContent = "Open menu";
        icon.setAttribute("d", "M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z");
    } else {
        nav.classList.add('show-menu');
        span.textContent = "Close menu";
        toggle.setAttribute('aria-expanded', 'true');
        icon.setAttribute("d", "m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z");
    }
});