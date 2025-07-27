
export default function headerSolid() {
    const header = document.querySelector("header");
  const upperHeader = header.querySelector("div");
    upperHeader.classList.add("hidden")
    const mainHeader = header.querySelector(".main-header");
    
    mainHeader.classList.remove("bg-gradient-to-b");
    mainHeader.classList.remove("to-transparent");
    mainHeader.classList.add("bg-secondary");
  }