// Elementet e DOM-it
let currentSlide = 0;
const slides = document.querySelectorAll(".slide");

// Inicializimi i slider-it
const init = (n) => {

    //Vendos display none per slidet tjer
    slides.forEach((slide) => {
        slide.style.display = "none";
    })

    //Vendos display block per slide-in aktiv
    slides[n].style.display = "block";

}

document.addEventListener("DOMContentLoaded", init(currentSlide));


// Butonat next dhe previous
const next = () => {
    currentSlide >= slides.length - 1 ? currentSlide = 0 : currentSlide++;
    init(currentSlide);
    autoS(true);
}

const prev = () => {
    currentSlide <= 0 ? currentSlide = slides.length - 1 : currentSlide--;
    init(currentSlide);
    autoS(true);
}

// Event listener per butonat next dhe previous
document.querySelector(".next").addEventListener('click', next);
document.querySelector(".prev").addEventListener('click', prev);

//Shfleto secilin slide pas 5 sekondash automatikisht
let repeat;

function autoS(b) {
    if (b) {
        clearInterval(repeat);
        repeat = setInterval(() => {
            next()
        }, 5000);
    } else {
        clearInterval(repeat);
    }
}

autoS(true);