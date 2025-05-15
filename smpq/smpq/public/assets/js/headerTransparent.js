export default function headerTransparent() {
    const header = document.querySelector("header");
    const upperHeader = header.querySelector("div");
    upperHeader.classList.remove("hidden")
    const mainHeader = header.querySelector(".main-header");
    mainHeader.classList.add("bg-gradient-to-b");
    mainHeader.classList.add("to-transparent");
    mainHeader.classList.remove("bg-secondary");
    console.log("header transparent ");
    
  }