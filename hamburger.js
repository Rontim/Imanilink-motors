const hamburger = document.querySelector(".hamberger-bars");
const navMenu = document.querySelector(".menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}
const navLink = document.querySelectorAll(".nav-branding");

navLink.forEach(n => n.addEventListener("click", closeMenu));

function closeMenu() {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}

const drop_down = document.querySelector(".drop-down");
const action = document.querySelector(".action");

action.addEventListener("click", ()=> {
    drop_down.classList.toggle("act");
    action.classList.toggle("act");
})

navLink.forEach(e => e.addEventListener("click", ()=>{
    drop_down.classList.add("act2");
    action.classList.add("act2");
}));
