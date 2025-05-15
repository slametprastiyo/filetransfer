
import * as fv from './fullView.js';


const fullView = document.querySelector(".full-view");
const fullViewCloseBtn = fullView.querySelector(".close-btn");
fullViewCloseBtn.addEventListener("click",()=>{
  fv.hide();
})

const achievementCards = document.querySelectorAll(".achievement-card");
achievementCards.forEach((card)=>{
    card.addEventListener("click",()=>{
        let src = card.querySelector("img");
        src = src.src;
        fv.show(src, "");
    })
})

const body = document.querySelector("body");
body.classList.remove("overflow-y-h");