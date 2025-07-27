export  function hide(){
    const body = document.querySelector("body");
    const fullView = document.querySelector(".full-view");
    const fullImage = fullView.querySelector("img");
        fullView.classList.add("hidden");
        fullImage.src = "";
        body.classList.remove("overflow-hidden");
}

export function show(src, det){
    const body = document.querySelector("body");
    const fullView = document.querySelector(".full-view");
    const fullImage = fullView.querySelector("img");
    const fullDetail = fullView.querySelector("p");
    fullImage.src= src;
    fullDetail.innerHTML = det;
    body.classList.add("overflow-hidden");
    fullView.classList.remove("hidden");
}