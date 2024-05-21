document.addEventListener('DOMContentLoaded', function() {
  const menuButton = document.getElementById('menu_butt');
  const slideMenu = document.getElementById('slide_menu');

  menuButton.addEventListener('mouseenter', function() {
    slideMenu.style.left = '0';
  });

  menuButton.addEventListener('mouseleave', function() {
    slideMenu.style.left = '-200px';
  });

  slideMenu.addEventListener('mouseenter', function() {
    slideMenu.style.left = '0';
  });

  slideMenu.addEventListener('mouseleave', function() {
    slideMenu.style.left = '-200px';
  });
});

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}