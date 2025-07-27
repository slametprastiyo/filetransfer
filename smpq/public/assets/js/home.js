import * as featuredJS from "./featured.js";

const baseURL = "http://localhost/smpq/";
// const fasilitasHeader = document.querySelector(".fasilitas-header");
// const fasilitasHeaderImg =  fasilitasHeader.querySelector("img");

// fasilitasHeaderImg.src = baseURL +"public/assets/images/"+fasilitasHeaderImg.dataset.src;
// fasilitasHeaderImg.addEventListener("load",()=>{
//     closeLoader();
// })

const breakpoints = { sm: 640, md: 768, lg: 1024, xl: 1280, "2xl": 1536 };

// highlights -------------------------------------------------------------------------
window.addEventListener("load", () => {
    const marqueeContent = document.querySelector(".marquee-content");
    document.documentElement.style.setProperty(
        "--highlight-content-width",
        "-" + marqueeContent.offsetWidth + "px",
    );
    console.log(marqueeContent.offsetWidth);
    marqueeContent.classList.add("start");
});

// highlights end ---------------------------------------------------------------------

// const featured = document.querySelector(".featured");
const featuredMain = document.querySelector(".featured-main");
// const featuredMainImg = featuredMain.querySelector("img");
// const featuredNav = featured.querySelector(".featured-nav");
// if(window.innerWidth >= breakpoints.md ){
// console.log(featuredNav);

// console.log(featuredMainImg);

// console.log(featuredNav.getBoundingClientRect().height);
// console.log(featuredNav.clientHeight);

// featuredMainImg.style.height = featuredNav.clientHeight+"px";
// featuredMainImg.classList.remove("h-0");
// featuredMain.classList.remove("aspect-video");
// featuredMain.classList.remove("w-full");

// }
// const featuredMainImg = featuredMain.querySelector(".image");
// console.log(featuredMainImg);
// featuredMainImg.style.backgroundImage = "url('http://localhost/smpq/public/assets/images/"+featuredMain.dataset.img+"')";

let featuredCat = "latest";
const featuredNavMenu = document.querySelectorAll(".featured-menu");
featuredNavMenu.forEach((menu) => {
    menu.addEventListener("click", (e) => {
        featuredCat = menu.dataset.featured;
        featuredJS.update(featuredCat);
    });
});

// const featuredMain = document.querySelector(".featured-main");
featuredMain.addEventListener("click", (e) => {
    window.location.href = baseURL + "berita/baca/" + featuredMain.dataset.id;
});

// berita featured -----------------------------------------------------------
const featuredNews = document.querySelector(".featured-main-img");

featuredNews.src = baseURL + "public/assets/images/" + featuredNews.dataset.img;
featuredNews.onload = () => {
    featuredNews.classList.remove("blur-lg");
};

// berita featured end -----------------------------------------------------------

// berita cards ---------------------------------------------------------------------
const allBerita = document.querySelectorAll(".berita-card");

let imageOptions = {
    rootMargin: "0px",
    threshold: 0.01, // Trigger when 1% of the image is visible
};

if ("IntersectionObserver" in window) {
    let imageObserver = new IntersectionObserver(function (entries, observer) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                let image = entry.target;
                const imgEl = image.querySelector("img");
                imgEl.src =
                    baseURL + "public/assets/images/" + image.dataset.hd;
                imgEl.onload = () => {
                    imgEl.classList.remove("blur-lg");
                };
                image.classList.add("lazyloaded"); // Optional: Add a class for styling/tracking
                observer.unobserve(image);
            }
        });
    }, imageOptions);

    allBerita.forEach(function (image) {
        image.addEventListener("click", () => {
            window.location.href = baseURL + "berita/baca/" + image.dataset.id;
        });
        imageObserver.observe(image);
    });
} else {
    // Fallback for browsers that don't support Intersection Observer
    // (e.g., using scroll, resize, and setTimeout events - more complex and less efficient)
    // For simplicity, this example doesn't include a full fallback.
    // A common approach is to just load all images if IO is not supported.
    allBerita.forEach(function (image) {
        baseURL + "berita/baca/" + image.dataset.id;
        const imgEl = image.querySelector("img");
        imgEl.src = baseURL + "public/assets/images/" + image.dataset.hd;
        imgEl.onload = () => {
            imgEl.classList.remove("blur-lg");
        };
    });
}

// berita cards end ---------------------------------------------------------------------

// sambutan KS -------------------------------------------------------
const kepalaSekolah = document.querySelector("img.kepala-sekolah");

if ("IntersectionObserver" in window) {
    let imageObserver = new IntersectionObserver(function (entries, observer) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                let image = entry.target;
                image.src =
                    baseURL + "public/assets/images/" + image.dataset.hd;
                image.onload = () => {
                    image.classList.remove("blur-lg");
                };
                image.classList.add("lazyloaded"); // Optional: Add a class for styling/tracking
                observer.unobserve(image);
            }
        });
    }, imageOptions);

    imageObserver.observe(kepalaSekolah);
} else {
    // Fallback for browsers that don't support Intersection Observer
    // (e.g., using scroll, resize, and setTimeout events - more complex and less efficient)
    // For simplicity, this example doesn't include a full fallback.
    // A common approach is to just load all images if IO is not supported.

    kepalaSekolah.src = baseURL + "public/assets/images/" + image.dataset.hd;
    kepalaSekolah.onload = () => {
        kepalaSekolah.classList.remove("blur-lg");
    };
}
// sambutan KS end ---------------------------------------------------
