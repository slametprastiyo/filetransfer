export default function closeLoader(){
    let loaderCounter = localStorage.getItem("loaderCounter");
    loaderCounter = loaderCounter - 1;
    localStorage.setItem("loaderCounter", loaderCounter);
    
    
    if(loaderCounter < 1){
      const loader = document.querySelector(".loader");
      const body = document.querySelector("body");
      setTimeout(() => {
        if(loader){
          loader.remove();
        }
        body.classList.remove("overflow-hidden");
    
      }, 1000);
    }
    
  }