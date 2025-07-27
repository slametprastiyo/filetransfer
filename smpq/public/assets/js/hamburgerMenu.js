import closeAllDropdownMenu from './closeAllDropdownMenu.js';
export default function hamburgerMenu() {
    const hamburgerMenu = document.querySelector("button.hamburger");
    const nav = document.querySelector("nav");
    hamburgerMenu.addEventListener("click", () => {
      const adminNav = document.querySelector(".admin-nav");
      
      nav.classList.toggle("hidden");
      
      if (hamburgerMenu.classList.contains("hamburger-active")) {
        closeAllDropdownMenu();
      }
      hamburgerMenu.classList.toggle("hamburger-active");
      
      if(adminNav != null){
          adminNav.classList.toggle("hidden");
          adminNav.style.top = nav.clientHeight + adminNav.clientHeight + 5 + "px";
          adminNav.style.minWidth = nav.clientWidth + "px";

      }
      
    })
    const dropdownparents = document.querySelectorAll(".dropdown-parent");
    dropdownparents.forEach((parent) => {
      const dropdown = parent.querySelector(".dropdown-menu");
      parent.addEventListener("mouseenter", () => {
        dropdown.classList.remove("hidden");
      });
      parent.addEventListener("mouseleave", () => {
        dropdown.classList.add("hidden");
      })
    })
  }