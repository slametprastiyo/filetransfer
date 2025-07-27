import scrollTop from "./scrollTop.js";

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
  });
}

const body = document.querySelector("body");
body.classList.remove("overflow-y-h");

window.addEventListener("load", () => {
  const allBeritaCard = document.querySelectorAll(".berita-card");
  allBeritaCard.forEach((card) => {
    const gambarBerita = card.querySelector("img.gambar-berita");
    // console.log(gambarBerita);
    gambarBerita.src =
      "http://localhost/smpq/public/assets/images/" + card.dataset.hd;
    gambarBerita.onload = () => {
      gambarBerita.classList.remove("blur-lg");
      gambarBerita.classList.remove("animate-pulse");
    };
  });
});
