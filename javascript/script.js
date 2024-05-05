const btn = document.querySelector("button");
const nav = document.querySelector("nav");

btn.addEventListener('click', function () {
    btn.classList.toggle("inactive");
    btn.classList.toggle("active");
    nav.classList.toggle("inactive");
    nav.classList.toggle("active");
});
