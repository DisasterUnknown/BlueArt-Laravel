const menu = document.getElementById('menu');
const menuTextElements = document.querySelectorAll('.menu-text');
const hamburger = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobileMenu');

// Sidebar expand on hover (desktop)
menu?.addEventListener('mouseenter', () => {
  menu.classList.replace('w-[75px]', 'w-[260px]');
  menuTextElements.forEach(el => el.classList.remove('hidden'));
});

menu?.addEventListener('mouseleave', () => {
  menu.classList.replace('w-[260px]', 'w-[75px]');
  menuTextElements.forEach(el => el.classList.add('hidden'));
});

// Toggle mobile menu
hamburger.addEventListener('click', () => {
  mobileMenu.classList.toggle('hidden');
});


