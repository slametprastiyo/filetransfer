const baseURL = "http://localhost/smpq/";
window.addEventListener("resize",()=>{
  console.log(window.innerWidth);
  
})

localStorage.setItem("loaderCounter", 2);

import headerSolid from './headerSolid.js';
import headerTransparent from './headerTransparent.js';
import hamburgerMenu from './hamburgerMenu.js';
import scrollTop from './scrollTop.js';
import closeLoader from './closeLoader.js';
import * as fv from './fullView.js';
window.addEventListener('load', function () {

  new WOW().init();
  let scrollPosition = window.scrollY;


  // eventOnScroll();
  const body = document.querySelector("body");
  const sectionHero = document.querySelector("section.hero");
  const sectionProgram = document.querySelector("section.program");
  const sectionEkstra = document.querySelector("section.ekstra");

 
  const scrollToTop = document.querySelector(".scroll-to-top");
  let childLinkActive = 0;

  // menutup area top header saat scroll
  const hero = document.querySelector("section");
  const header = document.querySelector("header");
  const upperHeader = header.querySelector("div");

  window.onscroll = function () {
    eventOnScroll();
    listenScroll();
    console.log("you are scrolling");
    
  };

  function eventOnScroll() {
    scrollPosition = window.scrollY;
    console.log(scrollPosition > (hero.clientHeight));
    
    if (scrollPosition > (hero.clientHeight)) {
      headerSolid();
    } else {
      headerTransparent();
      console.log("header should now transparent");
      
    }
  }


  // scroll to top
  function listenScroll() {
    if (scrollPosition > 1000) {
      scrollToTop.classList.remove("hidden");
      // headerBlack();
    } else {
      // headerTransparent();
      scrollToTop.classList.add("hidden");
    }
    scrollToTop.addEventListener("click", () => {
      scrollTop();
    })
  }



  // hero slide
  if (sectionHero) {
    const enrol = document.querySelectorAll(".enrol");
    const heroIdentity = document.querySelector(".identity");
    const heroIdentityImg = heroIdentity.querySelector("img");
    const heroIdentityH1 = heroIdentity.querySelector("h1");
    const prev = sectionHero.querySelector(".prev");
    const next = sectionHero.querySelector(".next");
    let count = 0;
    enrol.forEach((e) => {

      e.addEventListener("click", () => {

        window.open('https://s.id/smpqam', '_blank');
      });
    })
    prev.addEventListener("click", () => {
      plusSlides(-1);
      count = 0;
    })
    next.addEventListener("click", () => {
      plusSlides(1);
      count = 0;
    })
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }


    setInterval(() => {
      if (count < 31) {
        count += 1;
      } else {
        showSlides(slideIndex += 1);
        count = 0;
      }
      // console.log(count);

    }, 1000);

    function showSlides(n) {
      let slides = document.getElementsByClassName("mySlides");
      if(slides.length != 0){
        let i;
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
      }
      // console.log(slideIndex);

      if (slideIndex == 1) {
        heroIdentityImg.classList.add("wow","animate__animated","animate__fadeInUp");
        heroIdentityH1.classList.add("wow","animate__animated","animate__fadeInUp");
        heroIdentity.classList.remove("hidden");
        setTimeout(() => {
          heroIdentityImg.classList.remove("wow","animate__animated","animate__fadeInUp");
          heroIdentityH1.classList.remove("wow","animate__animated","animate__fadeInUp");
        }, 1500);
      } else {
        heroIdentityImg.classList.remove("wow","animate__animated","animate__fadeInUp");
        heroIdentityH1.classList.remove("wow","animate__animated","animate__fadeInUp");
        heroIdentity.classList.add("hidden");
      }

    }
    let slides = document.querySelectorAll(".mySlides");
    
    if(slides.length > 0){
      slides.forEach((slide, i) => {
      //   const hd = slide.querySelector("img.hd");
      //   hd.src = baseURL + "public/assets/images/" + slide.dataset.image;
      //   const thumb = slide.querySelector("img");
      //   const overlay = slide.querySelector(".overlay");
      //   hd.addEventListener("load", () => {
      //     if(i == 0){
      //     }
      //     hd.classList.remove("hidden");
      //     overlay.classList.add("hidden");
      //   })
      const pic = slide.querySelector("picture");
      const source = pic.querySelector("source");
      const img = pic.querySelector("img");
      source.srcset = baseURL + "public/assets/images/tes/"+ pic.dataset.desktop;
      img.src = baseURL + "public/assets/images/tes/"+ pic.dataset.mobile;
      
      img.addEventListener("load",()=>{
        if(i == 0){
                closeLoader();
              }
      })
      })
    }else{
      closeLoader();
      // console.log("hello world");
      
    }

    // const isInfo = localStorage.getItem("isInfo");
    // if (isInfo == null) {
    //   showInfo();
    //   localStorage.setItem("isInfo", Math.floor(Date.now() / 1000));
    // }else{
    //   const timestamp = localStorage.getItem("isInfo");
    //   if(Math.floor(Date.now() / 1000) - timestamp >= 60){
    //     localStorage.removeItem("isInfo");
    //     showInfo();
    //   localStorage.setItem("isInfo", Math.floor(Date.now() / 1000));
    //   }
    // }
  }



  // hero slide end


  // galery

  const galeryContainer = document.querySelector(".galery-container");


  loadGaleri();


  const loadMore = document.querySelector(".load-more.galeri");
  if (loadMore) {
    loadMore.addEventListener("click", () => {
      loadMore.classList.add("hidden");
      // cek element terakhir dari galeri, jika masih ada data lain di database maka tampilkan
      const cards = document.querySelectorAll('.galery-element');
      const lastCard = cards[cards.length - 1];
      const lastCardID = lastCard.dataset.id;
      // console.log(lastCardID);
      fetch(baseURL + 'galeri/load_more/' + lastCardID)
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
          }
          return response.json();
        })
        .then(result => {
          console.log(result);
          if (result.data != '') {
            result.data.forEach((d) => {
              console.log(d);
              const galeriEl = document.createElement("div");
              // console.log(d.dimension);

              galeriEl.classList.add(d.dimension);
              galeriEl.classList.add("rounded-lg", "galery-element", "w-full", "h-full", "relative", "overflow-hidden");

              galeriEl.setAttribute('data-id', d.id);
              galeriEl.setAttribute('data-hd', d.hd);
              galeriEl.setAttribute('data-thumb', d.thumb);
              galeriEl.setAttribute('data-caption', d.caption);
              galeriEl.setAttribute('data-dimension', d.dimension);

              const hdImg = document.createElement("img");
              hdImg.classList.add("rounded-md", "hd", "w-full", "h-full", "object-cover", "object-center", "hidden");
              const thumbImg = document.createElement("img");
              thumbImg.classList.add("rounded-md", "thumb", "w-full", "h-full", "object-cover", "object-center", "hidden");

              const overlay = document.createElement("div");
              overlay.classList.add("overlay", "w-full", "h-full", "bg-black", "absolute", "top-0", "left-0", "flex", "justify-center", "items-center");
              const imgLoader = document.createElement("img");
              imgLoader.src = baseURL + "public/assets/images/loader.svg";
              imgLoader.classList.add("w-5", "h-5", "rounded-lg");

              overlay.appendChild(imgLoader);
              galeriEl.appendChild(hdImg);
              galeriEl.appendChild(thumbImg);
              galeriEl.appendChild(overlay);
              galeryContainer.appendChild(galeriEl);
              // <div class="rounded-lg galery-element relative overflow-hidden"
              // data-id="<?= $g['id'] ;?>" data-hd="<?= $g['hd'] ;?>" data-thumb="<?= $g['thumb'] ;?>" data-caption="<?= $g['caption'] ;?>">
              //     <div class="menu h-fit absolute top-1/2 left-2 transition-all duration-300 opacity-0">
              //                     <button class="block  delete w-8 h-8 bg-[url('../images/trash.png')] bg-center bg-no-repeat bg-cover rounded-lg"></button>
              //                 </div>
              //     <img src="" class="rounded-md hd w-full h-full object-cover object-center hidden">
              //     <img src="" class="rounded-md thumb w-full h-full object-cover object-center hidden">
              //     <div class="overlay w-full h-full bg-black absolute top-0 left-0 flex justify-center items-center">
              //         <img src="<?= base_url() ?>public/assets/images/loader.svg" class="w-5 h-5 rounded-lg" alt="">
              //     </div>
              // </div>
            })
            loadGaleri();
            if (result.is_last == false) {
              loadMore.classList.remove("hidden");
            }
          }
          // Do something with the data
        })
        .catch(error => {
          console.error('There has been a problem with your fetch operation:', error);
        });

    })
  }
  function loadGaleri() {
    const galeryElements = document.querySelectorAll(".galery-element");


    const fullView = document.querySelector(".full-view");
    const fullViewCloseBtn = fullView.querySelector(".close-btn");
    fullViewCloseBtn.addEventListener("click",()=>{
      fv.hide();
    })

    galeryElements.forEach((el) => {
      // console.log(el);

      const thumbEl = el.querySelector(".thumb");
      const hdEl = el.querySelector(".hd");
      const overlay = el.querySelector(".overlay");
      // console.log(thumbEl);
      thumbEl.addEventListener("load", () => {
        thumbEl.classList.remove("hidden");
        hdEl.addEventListener("load", () => {
          hdEl.classList.remove("hidden");
          overlay.classList.add("hidden");
          thumbEl.classList.add("hidden");
        })
        hdEl.src = baseURL + "public/assets/images/" + el.dataset.hd;
      });
      thumbEl.src = baseURL + "public/assets/images/" + el.dataset.thumb;



      const size = el.dataset.size;


      el.addEventListener("click", () => {
       
        const src = baseURL + "public/assets/images/" + el.dataset.hd;
        const det = el.dataset.detail;
        // fullImagesrc = baseURL + "public/assets/images/" + el.dataset.hd;
        // fullDetail.innerHTML = el.dataset.detail;
      fv.show(src, det);

      

      })
      // full view end
    })
  }
  // galery end



  // nav

hamburgerMenu();



  const allLinkParent = document.querySelectorAll("a.parent-link");
  allLinkParent.forEach((link) => {
    link.addEventListener('click', function (event) {
      event.preventDefault();
      const menuChild = link.nextElementSibling;
      menuChild.classList.toggle("hidden");
      if (menuChild.classList.contains("hidden")) {
        childLinkActive -= 1;
      } else {
        childLinkActive += 1;
      }

      if (childLinkActive > 0) {
        body.classList.add("overflow-hidden");
      } else {
        body.classList.remove("overflow-hidden");
      }
    });
  })
  // link with # href
  const allSharpLink = document.querySelectorAll('.internal-link');
  allSharpLink.forEach((link) => {
    link.addEventListener("click", () => {
      console.log('helo');

      closeAllDropdownMenu();
      hamburgerMenu.classList.remove("hamburger-active");
      // closeMobileNav();
    })
  })
  // link with # href end
  // nav end




  // function closeMobileNav(){
  //   const allMenuChild = document.querySelectorAll(".menu-child");
  //   allMenuChild.forEach((menu)=>{
  //     menu.classList.add("hidden");
  //   })
  //   body.classList.remove("overflow-hidden");
  //   mobileNav.classList.remove("show");
  //   hamburgerMenu.classList.remove("hamburger-active");
  // }



  // berita dan artikel

  const allBerita = document.querySelectorAll(".berita-card");

  if (allBerita != null) {
    allBerita.forEach((card) => {
      const thumb = card.dataset.thumb;
      const hd = card.dataset.hd;
      const id = card.dataset.id;
      const overlay = card.querySelector(".overlay");
      const imgThumb = card.querySelector(".gambar-berita.thumb");
      imgThumb.src = baseURL + "public/assets/images/" + thumb;
      imgThumb.addEventListener("load", () => {
        const imgHD = card.querySelector(".gambar-berita.hd");
        imgHD.src = baseURL + "public/assets/images/" + hd;
        imgHD.addEventListener("load", () => {
          imgHD.classList.remove("hidden");
          overlay.classList.add("hidden");
          imgThumb.classList.add("hidden");
        })
      })
      // img.addEventListener("load",()=>)  
      card.addEventListener("click", () => {
        // console.log(card);
        const link = baseURL + '/berita/baca/' + id;
        window.open(link, '_self');
      })
    })

  }
  const bacaBerita = document.querySelector("section.baca-berita");
  if (bacaBerita) {
    const hd = bacaBerita.dataset.hd;
    const hdImage = bacaBerita.querySelector("img.hd");
    const overlay = bacaBerita.querySelector(".overlay");
    console.log(overlay);
    hdImage.src = baseURL + "public/assets/images/" + hd;
    hdImage.addEventListener("load", () => {
      hdImage.classList.remove("hidden");
      overlay.classList.add("hidden");
    })
  }


  // berita dan artikel end

// program
const programItems = document.querySelectorAll(".program-item");
// console.log(programItems[0]);

if(programItems[0] != null){
  let i = 0;
  programItems.forEach((p)=>{
    const icon = p.querySelector("a");
    setInterval(() => {
      icon.classList.add("wow","animate__animated","animate__shakeY");
      setTimeout(() => {
        icon.classList.remove("wow","animate__animated","animate__shakeY");
      }, 500);
    }, 2000 + i);  
    i += 100;   
  })
}

// program end


  // let myint = setInterval(() => {
  //   let coba = document.getElementsByClassName("galery-element");
  //   let c = Array.from(coba).filter(card => !card.classList.contains('hidden'));
  //   console.log(c);
  //   if(c == []){
  //     clearI();
  //   }
  //   c = c[0];
  //   c.classList.add("hidden");
  // }, 3000);

  // function clearI(){
  //   clearInterval(myint);
  // }

  // 


  // tutup semua dropdown menu

  // tutup semua dropdown menu end

  // load iframe youtube


  const sectionYoutube = document.querySelector("section.youtube");
if(sectionYoutube){
  const iframes = sectionYoutube.querySelectorAll("iframe.youtube");


  iframes.forEach((iframe) => {
    const src = iframe.dataset.src;
    if (iframe != null) {
      iframe.src = src;
    }
  })
}
  // load iframe youtube end
  // program
  // if (sectionHero != null && sectionProgram != null) {
  //   let swiper = new Swiper(".mySwiper", {
  //     slidesPerView: 2,
  //     spaceBetween: 30,
  //     centeredSlides: true,
  //     grabCursor: true,
  //     loop: true,
  //     pagination: {
  //       el: ".swiper-pagination",
  //       clickable: true,
  //     },
  //     breakpoints: {
  //       640: {
  //         slidesPerView: 3,
  //         spaceBetween: 20,
  //       },
  //       // 1024: {
  //       //   slidesPerView: 4,
  //       //   spaceBetween: 50,
  //       // },
  //     },
  //     autoplay: {
  //       delay: 3000,
  //     },

  //   });
  //   const sw = document.querySelector(".swiper");
  //   sw.addEventListener("mouseenter", () => {
  //     swiper.autoplay.stop();
  //   })
  //   sw.addEventListener("mouseleave", () => {
  //     swiper.autoplay.start();
  //   })
  // }
  // program end 
  // ekstra
  if (sectionHero != null && sectionEkstra != null) {
    let swiper = new Swiper(".ekstraSwiper", {
      slidesPerView: 2,
      spaceBetween: 30,
      centeredSlides: true,
      grabCursor: true,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
      },
      autoplay: {
        delay: 3000,
      },

    });
    const sw = document.querySelector(".swiper.ekstraSwiper");
    sw.addEventListener("mouseenter", () => {
      swiper.autoplay.stop();
    })
    sw.addEventListener("mouseleave", () => {
      swiper.autoplay.start();
    })
  }
  // ekstra end 
  listenScroll();
});


window.addEventListener("load", () => {
  // const enrol = document.querySelector(".enrol");
  // setInterval(() => {
  //   enrol.classList.add("wow", "animate__animated","animate__tada");
  //   setTimeout(() => {
  //     enrol.classList.remove("wow", "animate__animated","animate__tada");
  //   }, 2000);
  // }, 4000);
  // const ppdb = document.querySelector("section.ppdb");
  // if(ppdb){
  //   const images = ppdb.querySelectorAll("img");
  //   images.forEach((img)=>{
  //     img.src = baseURL +"public/assets/images/"+ img.dataset.src;
  //   })
  // }
  const pengumuman = document.querySelector(".pengumuman");
  const megaphone = document.querySelector(".megaphone");

  if (pengumuman) {
    const img = pengumuman.querySelector("img");
    const close = pengumuman.querySelector(".close-btn");
    const body = document.querySelector("body");
    img.src = baseURL + "public/assets/images/" + img.dataset.img;
    close.addEventListener("click", () => {
      pengumuman.classList.add("hidden");
      body.classList.remove("overflow-hidden");
      megaphone.classList.remove("hidden");
      megaphone.classList.add("wow", "animate__animated", "animate__tada", "animate__infinite");
      localStorage.setItem("pengumuman", Date.now() / 1000);

    })

    if (localStorage.getItem('pengumuman') == null) {

        pengumuman.classList.remove("hidden");
        body.classList.add("overflow-hidden");
      



    } else if ((Date.now() / 1000) - localStorage.getItem("pengumuman") >= 300) {
      localStorage.removeItem("pengumuman");

    
        pengumuman.classList.remove("hidden");
        body.classList.add("overflow-hidden");

    } else {
      megaphone.classList.remove("hidden");

    }
  }
  if (megaphone) {
   
    megaphone.addEventListener("click", () => {
      const body = document.querySelector("body");
      pengumuman.classList.remove("hidden");
      body.classList.add("overflow-hidden");
      localStorage.setItem("pengumuman", Date.now() / 1000);
    })
  }



})

