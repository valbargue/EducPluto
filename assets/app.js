/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
// import './styles/sass/app.scss';
import "./sass/style.scss";

// start the Stimulus application
import "./bootstrap";


// NAV BAR EFFET SCROLLING
var swiper = new Swiper(".mySwiper", {

  slidesPerView: 1,

  breakpoints: {

    720: {
      slidesPerView: 2,
    },
    900: {
      slidesPerView: 3,
    }
  },


  spaceBetween: 30,
  slidesPerGroup: 3,
  loop: true,
  loopFillGroupWithBlank: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

window.addEventListener("scroll", function(){
  var header = document.querySelector("header");
  header.classList.toggle("sticky", window.scrollY > 0);
})

// MENU BURGER

const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-link')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})
