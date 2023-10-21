const navToggle = document.querySelector(".nav__toggle")
const nav = document.querySelector(".nav");
const hamburger = document.querySelector('hamburger');
console.log("hello")
navToggle.addEventListener("click", () => {
    
    nav.classList.toggle("nav--visible")
})