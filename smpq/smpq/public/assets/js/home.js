import * as featuredJS from './featured.js';


const baseURL = "http://localhost/smpq/";
// const fasilitasHeader = document.querySelector(".fasilitas-header");
// const fasilitasHeaderImg =  fasilitasHeader.querySelector("img");

// fasilitasHeaderImg.src = baseURL +"public/assets/images/"+fasilitasHeaderImg.dataset.src;
// fasilitasHeaderImg.addEventListener("load",()=>{
//     closeLoader();
// })

const breakpoints = { sm: 640, md: 768, lg: 1024, xl: 1280, '2xl': 1536, };

const featured = document.querySelector(".featured");
const featuredMain = featured.querySelector(".featured-main");
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
featuredMain.style.backgroundImage = "url('http://localhost/smpq/public/assets/images/"+featuredMain.dataset.img+"')";



let featuredCat = "latest";
const featuredNavMenu = featured.querySelectorAll(".featured-menu");
featuredNavMenu.forEach((menu)=>{
    menu.addEventListener("click",(e)=>{
        featuredCat = menu.dataset.featured;
        featuredJS.update(featuredCat);
    })
})

// const featuredMain = document.querySelector(".featured-main");
featuredMain.addEventListener("click",(e)=>{
    window.location.href = baseURL+"berita/baca/"+featuredMain.dataset.id;
})