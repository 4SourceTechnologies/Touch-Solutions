"use strict"

const carousel = document.querySelector(".carosel1");
const arrowBtns = document.querySelectorAll(".wrapper i");
const firstCardwidth = carousel.querySelector(".col-2").offsetwidth;
const dragging = (e) => {
    carousel.scrollLeft = e.pageX;
}
arrowBtns.forEach(btn =>{
btn.addEventListener("click", () =>{
    carousel.scrollLeft = btn.id === "left" ? - firstCardwidth : firstCardwidth;
})
})
carousel.addEventListener("mousemove" , dragging);