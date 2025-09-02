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

// Change login logout btn acording to the user login
window.onload = () => {
  let roleID = sessionStorage.getItem('RoleID') || "";
  if (roleID == "") {
    document.querySelector('#logInOut span:nth-of-type(1)').innerHTML = "Login";
    document.querySelector('#logInOut span:nth-of-type(2)').innerHTML = "Login";
    document.getElementById('logInOutMobile').innerHTML = "Login";
  }
}

