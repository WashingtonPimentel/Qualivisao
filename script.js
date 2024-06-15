const slides = document.querySelectorAll('.slide');
const autoBtns = document.querySelectorAll('.auto-btn');
const manualBtns = document.querySelectorAll('.manual-btn');

let currentSlide = 0;

// Function to change slides
function changeSlide(index) {
  if (index >= slides.length) {
    index = 0;
  } else if (index < 0) {
    index = slides.length - 1;
  }
  slides.forEach((slide, i) => {
    slide.style.transform = `translateX(${-index * 100}%)`;
  });
  currentSlide = index;
}

// Auto slide function
function autoSlide() {
  currentSlide++;
  changeSlide(currentSlide);
}

// Auto slide interval
let slideInterval = setInterval(autoSlide, 3000);

// Manual navigation
manualBtns.forEach((btn, i) => {
  btn.addEventListener('click', () => {
    clearInterval(slideInterval);
    changeSlide(i);
    slideInterval = setInterval(autoSlide, 3000); // Reset interval
  });
});

document.addEventListener("DOMContentLoaded", function () {
    const floatingTab = document.querySelector(".floating-tab");
    const floatingContent = document.querySelector(".floating-content");
  
    floatingTab.addEventListener("click", function () {
      floatingContent.classList.toggle("show");
    });
  });
