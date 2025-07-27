import * as search from './search.js';
const body = document.querySelector("body");


// nav

const hamburgerMenu = document.querySelector("button.hamburger");
const nav = document.querySelector("nav");
const adminNav = document.querySelector(".admin-nav");
if (hamburgerMenu) {
  hamburgerMenu.addEventListener("click", () => {
    nav.classList.toggle("hidden");
    adminNav.classList.toggle("hidden");
    if (hamburgerMenu.classList.contains("hamburger-active")) {
      closeAllDropdownMenu();
    }
    hamburgerMenu.classList.toggle("hamburger-active");
    adminNav.style.top = nav.clientHeight + adminNav.clientHeight + 5 + "px";
    adminNav.style.minWidth = nav.clientWidth + "px";
  });


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

// tutup semua dropdown menu
function closeAllDropdownMenu() {
  const nav = document.querySelector("nav");
  const adminNav = document.querySelector(".admin-nav");
  const allDropdownMenu = document.querySelectorAll(".dropdown-menu");
  console.log(nav);
  console.log(adminNav);

  nav.classList.add("hidden");
  adminNav.classList.add("hidden");
  allDropdownMenu.forEach((item) => {
    item.classList.add("hidden");
    console.log(item);

  })
}
// tutup semua dropdown menu end
// nav end

const main = document.querySelector(".main");
const paragraphs = main.querySelectorAll("p");
let p;
paragraphs.forEach((el) => {
  if (el.innerHTML != "" && p == null) {
    p = el;
    return;
  }
  // console.log(el.innerHTML == "");

})
paragraphs.forEach((el) => {
  // if (el.innerHTML != "" && p == null) {
    el.classList.add("text-justify", "my-2");
  // }

})

p.classList.add("first-paragraph");

console.log(Math.floor(Date.now() / 1000) - 1730940571);


// view count
const sectionBacaBerita = document.querySelector("#baca-berita");
// localStorage.removeItem("view");
const beritaID = sectionBacaBerita.dataset.id;
// fetch('http://localhost/smpq/berita/increaseView?id=' + beritaID);
// console.log(sectionBacaBerita.dataset.id);
const view = localStorage.getItem(beritaID);
// const view = null;
if (view == null) {
  setViewLog(beritaID);
  fetch('http://localhost/smpq/berita/increaseView?id=' + beritaID);
} else {
  console.log(beritaID);
  const data = JSON.parse(localStorage.getItem(beritaID));
  if (data['id'] == beritaID) {
    // console.log(data['id'])
    console.log(Math.floor(Date.now() / 1000) - data['timestamp']);
    if ((Math.floor(Date.now() / 1000)) - data['timestamp'] >= 3600) {
      
      fetch('http://localhost/smpq/berita/increaseView?id=' + beritaID);
      localStorage.removeItem(beritaID);
      const data = {
        "id": beritaID,
        "timestamp": Math.floor(Date.now() / 1000)
      };

      localStorage.setItem(beritaID, JSON.stringify(data));
    }
  }

}
// {"id":"26","timestamp":1730273247}
function setViewLog(beritaID) {
  const data = {
    "id": beritaID,
    "timestamp": Math.floor(Date.now() / 1000)
  };

  localStorage.setItem(beritaID, JSON.stringify(data));
  // localStorage.setItem(beritaID, beritaID+"|"+Math.floor(Date.now() / 1000));
}
// setInterval(() => {
//   console.log(Math.floor(Date.now() / 1000));

// }, 1000);

// view count end


// tag link ----------------------------------------
const searchbar = document.querySelectorAll(".search-bar");
searchbar.forEach((sb) => {
  const searchbarInput = sb.querySelector("input");
  const searchbarIcon = sb.querySelector("i");
  const tagLinks = document.querySelectorAll(".tag-link");
  console.log(tagLinks);
  
  if(tagLinks != null){
    tagLinks.forEach((link)=>{
      link.addEventListener("click",()=>{        
        const keyword = link.innerHTML;
        searchbarInput.value = keyword;
        // console.log(keyword);
        
        search.searchOpen(keyword.toLocaleLowerCase());
  
      })
    })
  }
})


// tag link ----------------------------------------

body.classList.remove("overflow-y-h");
body.classList.remove("overflow-hidden");