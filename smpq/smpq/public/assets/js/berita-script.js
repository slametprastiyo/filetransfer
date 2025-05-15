
import scrollTop from './scrollTop.js';

let scrollPosition = window.scrollY;
const scrollToTop = document.querySelector(".scroll-to-top");

 window.onscroll = function () {
    listenScroll();
    
  };


  // scroll to top
  function listenScroll() {
    if (scrollPosition > 1000) {
      scrollToTop.classList.remove("hidden");
      // headerBlack();
    } else {
      // headerTransparent();
      scrollToTop.classList.add("hidden");
    }
    scrollToTop.addEventListener("click", () => {
      scrollTop();
    })
  }

  const body = document.querySelector("body");
  body.classList.remove("overflow-y-h");
