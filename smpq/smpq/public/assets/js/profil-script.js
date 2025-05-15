
  const hamburgerMenu = document.querySelector("button.hamburger");
  const nav = document.querySelector("nav");
  const adminNav = document.querySelector(".admin-nav");



  const allLinkParent = document.querySelectorAll("a.parent-link");





//   aside
 let scrollPosition;
      window.addEventListener("scroll",()=>{

     
          if(window.innerWidth >= 768){
            const aside = document.querySelector(".aside-container");
            const main = document.querySelector("main");
        scrollPosition = window.scrollY;
    
        console.log(scrollPosition);
        
        if (scrollPosition >= 412) {
            aside.classList.add("fixed");
            aside.classList.add("top-32");
            main.classList.add("ml-48");
        }else{
            aside.classList.remove("fixed");
            aside.classList.remove("top-32");
            main.classList.remove("ml-48");
          }
      }
    })


//   aside end
const body = document.querySelector("body");
body.classList.remove("overflow-y-h");
