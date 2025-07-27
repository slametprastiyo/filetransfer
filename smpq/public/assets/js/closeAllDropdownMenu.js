export default function closeAllDropdownMenu() {
    const nav = document.querySelector("nav");
    const adminNav = document.querySelector(".admin-nav");
    const allDropdownMenu = document.querySelectorAll(".dropdown-menu");
    nav.classList.add("hidden");
    // if (!adminNav.classList.contains("hidden")) {
    //   adminNav.classList.add("hidden");
    // }
    allDropdownMenu.forEach((item) => {
      item.classList.add("hidden");
      // console.log(item);
    })
    // hamburgerMenu.classList.remove("hamburger-active");
  }