function checkResponsive() {
  if (window.matchMedia("(max-width: 800px)").matches) {
    // Add the event listeners only in responsive mode
    document.addEventListener('DOMContentLoaded', function() {
      const menuButton = document.getElementById('menu_butt');
      const slideMenu = document.getElementById('slide_menu');

      menuButton.addEventListener('mouseenter', showSlideMenu);
      menuButton.addEventListener('mouseleave', hideSlideMenu);
      slideMenu.addEventListener('mouseenter', showSlideMenu);
      slideMenu.addEventListener('mouseleave', hideSlideMenu);
    });
  } else {
    // Clean up event listeners if necessary when not in responsive mode
    document.removeEventListener('DOMContentLoaded', function() {
      const menuButton = document.getElementById('menu_butt');
      const slideMenu = document.getElementById('slide_menu');

      menuButton.removeEventListener('mouseenter', showSlideMenu);
      menuButton.removeEventListener('mouseleave', hideSlideMenu);
      slideMenu.removeEventListener('mouseenter', showSlideMenu);
      slideMenu.removeEventListener('mouseleave', hideSlideMenu);
    });
  }
}

function showSlideMenu() {
  const slideMenu = document.getElementById('slide_menu');
  slideMenu.style.left = '0';
}

function hideSlideMenu() {
  const slideMenu = document.getElementById('slide_menu');
  slideMenu.style.left = '-9000px';
}

// Check on load
checkResponsive();

// Check on resize
window.addEventListener('resize', checkResponsive);

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