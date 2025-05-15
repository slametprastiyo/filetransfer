const baseURL = "http://localhost/smpq/";


// admin / banner
const tambahBannerBtn = document.querySelector("#tambah-banner-btn");
const formTambahBanner = document.querySelector("#tambah-banner");
const bannerContainer = document.querySelector(".banner-container");
const restrict = document.querySelector(".restrict");

// console.log(tambahBannerBtn);
// console.log(formTambahBanner);
if (tambahBannerBtn != null) {

  tambahBannerBtn.addEventListener("click", () => {
    formTambahBanner.classList.remove("hidden");
    const bannerMobilePreview = formTambahBanner.querySelector("img.banner-mobile-preview");
    const bannerDesktopPreview = formTambahBanner.querySelector("img.banner-desktop-preview");
    const inputBannerMobile = formTambahBanner.querySelector("#banner-mobile");
    const inputBannerDesktop = formTambahBanner.querySelector("#banner-desktop");
    inputBannerMobile.addEventListener("change", (event) => {
      const fileInput = event.target;
      const file = event.target.files[0];
      if (file) {
        const fileSize = file.size; // File size in bytes
        const maxSize = 8 * 1024 * 1024; // 3 MB in bytes

        if (fileSize > maxSize) {

          Swal.fire({
            position: "top-end",
            icon: "error",
            title: "File terlalu besar. Max 3 mb!",
            showConfirmButton: false,
            timer: 3000
          });
          fileInput.value = "";
        } else {
          const reader = new FileReader();
          reader.readAsDataURL(file);
          reader.onload = function (event) {

            const img = new Image();
            img.src = event.target.result;
            img.onload = function () {
              const width = img.width;
              const height = img.height;

              if ((width / height) > 0.5 && (width / height) < 0.6) {
                console.log("correct dimension" + width / height);

                bannerMobilePreview.src = event.target.result;
                bannerMobilePreview.classList.remove("hidden"); // Show the image
              } else {
                Swal.fire({
                  position: "top-end",
                  icon: "error",
                  title: "Rasio aspek tidak sesuai. Rasio seharusnya 6 x 19 (lebar x tinggi)",
                  showConfirmButton: false,
                  timer: 3000
                });
                fileInput.value = "";

              }

            };
          }



        }
      }
    });
    inputBannerDesktop.addEventListener("change", (event) => {
      const fileInput = event.target;
      const file = event.target.files[0];
      if (file) {
        const fileSize = file.size; // File size in bytes
        const maxSize = 8 * 1024 * 1024; // 3 MB in bytes

        if (fileSize > maxSize) {

          Swal.fire({
            position: "top-end",
            icon: "error",
            title: "File terlalu besar. Max 3 mb!",
            showConfirmButton: false,
            timer: 3000
          });
          fileInput.value = "";
        } else {
          const reader = new FileReader();
          reader.readAsDataURL(file);
          reader.onload = function (event) {

            const img = new Image();
            img.src = event.target.result;
            img.onload = function () {
              const width = img.width;
              const height = img.height;

              if ((width / height) > 1.6 && (width / height) < 1.88) {
                bannerDesktopPreview.src = event.target.result;
                bannerDesktopPreview.classList.remove("hidden"); // Show the image
              } else {
                Swal.fire({
                  position: "top-end",
                  icon: "error",
                  title: "Rasio aspek tidak sesuai. Rasio seharusnya 16 x 9 (lebar x tinggi)",
                  showConfirmButton: false,
                  timer: 3000
                });
                fileInput.value = "";

              }

            };
          }



        }
      }
    });



    const closeBtn = formTambahBanner.querySelector(".close-btn");
    closeBtn.addEventListener("click", () => {
      formTambahBanner.classList.add("hidden");
      bannerMobilePreview.src = "";
      bannerDesktopPreview.src = "";
    })
  })
}

const allBannerCard = document.querySelectorAll(".banner-card");
if (allBannerCard != null) {
  allBannerCard.forEach((banner) => {
    // delete
    const idBanner = banner.dataset.id;
    const namaBanner = banner.dataset.name;
    const deleteBtn = banner.querySelector(".delete");
    // let priorityMenu = banner.querySelector(".priority");
    // // let priorityMenuComputedStyle = getComputedStyle(priorityMenu);
    // // let priorityMenuTop = (priorityMenuComputedStyle.top).substring(0, 2);
    // const menu = banner.querySelector(".menu");

    // console.log(priorityMenuTop);
    // console.log(priorityMenu.clientHeight);
    // console.log(priorityMenu.clientHeight / 2);

    deleteBtn.addEventListener("click", () => {
      Swal.fire({
        title: 'Are you sure?',
        text: 'Hapus ' + namaBanner + ' ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          // Redirect to your delete function or send an AJAX request
          // window.location.href = baseURL + 'admin/banner_delete/' + idBanner;
          deleteBanner(idBanner);
        }
      })
    })
    // delete end

    // update priority
    const up = banner.querySelector(".up");
    const down = banner.querySelector(".down");
    const top = banner.querySelector(".top");
    const bottom = banner.querySelector(".bottom");
    up.addEventListener("click", () => {

      priorityUp(idBanner);
    })

    down.addEventListener("click", async () => {
      priorityDown(idBanner);
    })
    top.addEventListener("click", async () => {
      priorityTop(idBanner);
    })
    bottom.addEventListener("click", async () => {
      priorityBottom(idBanner);
    })



    // update priority end
  })
}
function priorityUp(idBanner) {
  changePriority("up", idBanner);
}
function priorityDown(idBanner) {
  changePriority("down", idBanner);
}
function priorityTop(idBanner) {
  changePriority("top", idBanner);
}
function priorityBottom(idBanner) {
  changePriority("bottom", idBanner);
}
function changePriority(direction, idBanner) {
  restrict.classList.remove("hidden");

  const xhr = new XMLHttpRequest();
  xhr.open('GET', baseURL + 'admin/banner_priority/' + direction + "/" + idBanner);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // console.log(xhr.responseText);return;
      data = JSON.parse(xhr.responseText);
      console.log(data);
      if (direction == "up") {
        const movedBanner = document.getElementById(idBanner);
        const upperBanner = movedBanner.previousElementSibling;
        console.log(movedBanner);
        console.log(upperBanner);
        movedBanner.classList.add("wow", "animate__animated", "animate__slideOutUp");
        upperBanner.classList.add("wow", "animate__animated", "animate__slideOutDown");
        movedBanner.style.setProperty('--animate-duration', '0.5s');
        upperBanner.style.setProperty('--animate-duration', '0.5s');
      }
      if (direction == "down") {
        const movedBanner = document.getElementById(idBanner);
        const lowerBanner = movedBanner.nextElementSibling;

        movedBanner.classList.add("wow", "animate__animated", "animate__slideOutDown");
        lowerBanner.classList.add("wow", "animate__animated", "animate__slideOutUp");
        movedBanner.style.setProperty('--animate-duration', '0.5s');
        lowerBanner.style.setProperty('--animate-duration', '0.5s');
      }
      if (direction == "top") {
        const movedBanner = document.getElementById(idBanner);
        movedBanner.classList.add("wow", "animate__animated", "animate__slideOutUp");
        movedBanner.style.setProperty('--animate-duration', '0.5s');
        let previousSiblings = [];
        let sibling = movedBanner.previousElementSibling;
        while (sibling) {
          previousSiblings.push(sibling);
          sibling = sibling.previousElementSibling;
        }
        previousSiblings.forEach((e) => {
          e.classList.add("wow", "animate__animated", "animate__slideOutDown");
          e.style.setProperty('--animate-duration', '0.5s');
        })
      }

      if (direction == "bottom") {
        const movedBanner = document.getElementById(idBanner);
        movedBanner.classList.add("wow", "animate__animated", "animate__slideOutDown");
        movedBanner.style.setProperty('--animate-duration', '0.5s');

        let nextSiblings = [];
        let sibling = movedBanner.nextElementSibling;
        while (sibling) {
          nextSiblings.push(sibling);
          sibling = sibling.nextElementSibling;
        }
        nextSiblings.forEach((e) => {
          e.classList.add("wow", "animate__animated", "animate__slideOutUp");
          e.style.setProperty('--animate-duration', '0.5s');
        })

      }
      // if (data == true) {
      //   let targetCard = null;
      //   const movedCard = document.getElementById(idBanner);
      //   if (direction == "up") {
      //     targetCard = movedCard.previousElementSibling;

      //     targetCard.classList.add("wow", "animate__animated", "animate__slideOutDown");
      //     movedCard.classList.add("wow", "animate__animated", "animate__slideOutUp");

      //   } else {
      //     targetCard = movedCard.nextElementSibling;
      //     targetCard.classList.add("wow", "animate__animated", "animate__slideOutUp");
      //     movedCard.classList.add("wow", "animate__animated", "animate__slideOutDown");
      //   }
      //   console.log(direction);
      //   console.log(idBanner);
      //   console.log(movedCard);
      //   console.log(targetCard);
        setTimeout(() => {
      repopulateBanner();
        }, 200);
      // }
      // setTimeout(() => {
      //   window.location.assign(baseURL + "admin/banner");
      // }, 300);
      restrict.classList.add("hidden");
    }
  }
  xhr.send();
}
function repopulateBanner() {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', baseURL + 'admin/repopulateBanner');
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {

      bannerContainer.innerHTML = "";
      // -------------------------------------------
      let data = null;
      data = JSON.parse(xhr.responseText);
console.log(data);

      data.forEach((d) => {
        const bannerCard = document.createElement("div");
        bannerCard.classList.add("banner-card","relative","transition-transform","duration-100","rounded-2xl","py-2","my-1","bg-cover","bg-center","w-full","bg-white","shadow-md","p-2");
        bannerCard.setAttribute("data-id", d['id']);
        bannerCard.setAttribute("data-name", d['name']);
        bannerCard.setAttribute("id", d['id']);
        // ------------------ title
        const title = document.createElement("div");
        title.classList.add("title", "text-sm", "text-gray-600");
        title.innerHTML = d['name'];
        bannerCard.appendChild(title);

        // ------------------ title end
        // ------------------- img
        const bannerImg = document.createElement("div");
        bannerImg.classList.add("banner-img","h-52","flex");
        // -------------------- img mobile
        const imgMobileContainer = document.createElement("div");
        imgMobileContainer.classList.add("banner-mobile-img","w-4/12","flex","justify-center");
        const imgMobile = document.createElement("img");
        imgMobile.classList.add("rounded-lg","h-full");
        imgMobile.src = baseURL+"public/assets/images/tes/"+d['mobile'];

        imgMobileContainer.appendChild(imgMobile);
        bannerImg.appendChild(imgMobileContainer);
        bannerCard.appendChild(bannerImg);
        // -------------------- img mobile end
        // -------------------- img desktop
        const imgDesktopContainer = document.createElement("div");
        imgDesktopContainer.classList.add("banner-mobile-img","w-8/12","flex","justify-center");
        const imgDesktop = document.createElement("img");
        imgDesktop.classList.add("rounded-lg","h-full");
        imgDesktop.src = baseURL+"public/assets/images/tes/"+d['desktop'];

        imgDesktopContainer.appendChild(imgDesktop);
        bannerImg.appendChild(imgDesktopContainer);
        bannerCard.appendChild(bannerImg);
        // -------------------- img desktop end

        // ------------------- img end
        // -------------------- left menu
        const leftMenu = document.createElement("div");
        leftMenu.classList.add("left-menu","absolute","w-7","h-full","-left-7","top-0","flex","flex-col","justify-center","text-center","items-center");
        const del = document.createElement("i");
        del.classList.add("delete","fa-solid","fa-trash","text-red-500","hover:scale-125","transition-transform","w-fit","my-2");
        del.addEventListener("click", () => {
          Swal.fire({
            title: 'Are you sure?',
            text: 'Hapus ' + d['name'] + ' ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              deleteBanner(d['id']);
            }
          })
        })
        leftMenu.appendChild(del);
        bannerCard.appendChild(leftMenu);
        // -------------------- left menu end
        // --------------------- right
        const rightMenu = document.createElement("div");
        rightMenu.classList.add("right-menu","absolute","w-7","h-full","-right-9","top-0","flex","flex-col","justify-center","text-center","items-center");
        const top = document.createElement("div");
        top.classList.add("top","w-7","h-7","border","opacity-50","hover:opacity-100","border-primary","my-2","hover:h-12","rounded-full","transition-all","bg-[url('../images/arrow-to-top.png')]","bg-center","bg-no-repeat","bg-cover");
        top.addEventListener("click",()=>{
          priorityTop(d['id']);
        })
        const up = document.createElement("div");
        up.classList.add("up","w-7","h-7","border","opacity-50","hover:opacity-100","border-primary","my-2","hover:h-12","rounded-full","transition-all","bg-[url('../images/arrow-up.png')]","bg-center","bg-no-repeat","bg-cover");
        up.addEventListener("click",()=>{
          priorityUp(d['id']);
        })
        const down = document.createElement("div");
        down.classList.add("down","w-7","h-7","border","opacity-50","hover:opacity-100","border-primary","my-2","hover:h-12","rounded-full","transition-all","bg-[url('../images/arrow-down.png')]","bg-center","bg-no-repeat","bg-cover");
        down.addEventListener("click",()=>{
          priorityDown(d['id']);
        })
        const bottom = document.createElement("div");
        bottom.classList.add("bottom","w-7","h-7","border","opacity-50","hover:opacity-100","border-primary","my-2","hover:h-12","rounded-full","transition-all","bg-[url('../images/arrow-to-bottom.png')]","bg-center","bg-no-repeat","bg-cover");
        bottom.addEventListener("click",()=>{
          priorityBottom(d['id']);
        })
        rightMenu.appendChild(top);
        rightMenu.appendChild(up);
        rightMenu.appendChild(down);
        rightMenu.appendChild(bottom);
        bannerCard.appendChild(rightMenu);
        // --------------------- right end






        bannerContainer.appendChild(bannerCard);
      })

      setUpButtons();
      restrict.classList.add("hidden");

      // -------------------------------------------

    }
  };
  xhr.send();
}


function deleteBanner(idBanner) {
  restrict.classList.remove("hidden");

  const xhr = new XMLHttpRequest();
  xhr.open('GET', baseURL + 'admin/banner_delete/' + idBanner);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log(xhr.responseText);
      if(parseInt(xhr.responseText) == 1){
        const banner = document.getElementById(idBanner);     
        banner.classList.add("wow", "animate__animated","animate__zoomOutRight");
        setTimeout(() => {
          repopulateBanner();
        
        }, 500);
        
      }
      // data = (xhr.responseText);
      // console.log(data);
      
      restrict.classList.add("hidden");
  
    }
  }
  xhr.send();
}
// function changePriority(direction, idBanner) {

//   const xhr = new XMLHttpRequest();
//   xhr.open('GET', baseURL+'admin/banner_priority/'+direction+"/"+idBanner);
//   xhr.onreadystatechange = function () {
//       if (xhr.readyState === 4 && xhr.status === 200) {
//           return JSON.parse(xhr.responseText);
//       }
//   };
//   xhr.send();
// }

// admin / galery
const sectionGaleri = document.querySelector("section.galeri");
if (sectionGaleri != null) {
  const tambahgaleriBtn = document.querySelector("#tambah-galeri-btn");
  const formTambahGaleri = document.querySelector("#tambah-galeri");
  if (tambahgaleriBtn != null) {
    tambahgaleriBtn.addEventListener("click", () => {
      formTambahGaleri.classList.remove("hidden");
      const preview = formTambahGaleri.querySelector("img.preview");
      const inputImage = formTambahGaleri.querySelector("#file");
      inputImage.addEventListener("change", (event) => {
        const file = event.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function (e) {
            preview.src = e.target.result;
            preview.classList.remove("hidden"); // Show the image
          };
          reader.readAsDataURL(file);
        }
      })





      // parent.classList.remove("hidden");
      const closeBtn = formTambahGaleri.querySelector(".close-btn");
      closeBtn.addEventListener("click", () => {
        // parent.classList.add("hidden");
        formTambahGaleri.classList.add("hidden");
      })
    })
  }




  const allGaleriCard = sectionGaleri.querySelectorAll(".galery-element");
  console.log(allGaleriCard);
  allGaleriCard.forEach((card) => {

    const hdEl = card.querySelector(".hd");
    const thumbEl = card.querySelector(".thumb");
    const overlay = card.querySelector(".overlay");
    const deleteBtn = card.querySelector("button.delete");
    const idGaleri = card.dataset.id;
    console.log(idGaleri);

    const galeriCaption = card.dataset.caption;
    deleteBtn.addEventListener("click", () => {
      Swal.fire({
        title: 'Hapus?',
        text: galeriCaption,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          // Redirect to your delete function or send an AJAX request
          window.location.href = baseURL + 'admin/galeri_delete/' + idGaleri;
        }
      })
    })

    thumbEl.src = baseURL + "public/assets/images/" + card.dataset.thumb;
    thumbEl.addEventListener("load", () => {
      hdEl.src = baseURL + "public/assets/images/" + card.dataset.hd;
      thumbEl.classList.remove("hidden");
      hdEl.addEventListener("load", () => {
        thumbEl.classList.add("hidden");
        overlay.classList.add("hidden");
        hdEl.classList.remove("hidden");
      })
    })

    const menu = card.querySelector(".menu");
    card.addEventListener("mouseenter", () => {
      menu.classList.remove("left-2");
      menu.classList.add("left-4");
      menu.classList.remove("opacity-0");
      menu.classList.add("opacity-100");
    })
    card.addEventListener("mouseleave", () => {
      menu.classList.add("left-2");
      menu.classList.remove("left-4");
      menu.classList.add("opacity-0");
      menu.classList.remove("opacity-100");
    })
  })
}
// admin / galery end


// hide up button for first banner card
// console.log(bannerContainer.firstElementChild);
function setUpButtons(){
  if(bannerContainer){
    const firstBannerCard = bannerContainer.firstElementChild;
    if(firstBannerCard != null){
      const upBtn = firstBannerCard.querySelector(".up");
      const topBtn = firstBannerCard.querySelector(".top");
      upBtn.classList.add("hidden");
      topBtn.classList.add("hidden");
      // hide up button for first banner card end
      
      // hide down button for last banner card
      const lastBannerCard = bannerContainer.lastElementChild;
      console.log(lastBannerCard);
      
      const downBtn = lastBannerCard.querySelector(".down");
      downBtn.classList.add("hidden");
      const bottomBtn = lastBannerCard.querySelector(".bottom");
      bottomBtn.classList.add("hidden");
      
      
      const secondTop = firstBannerCard.nextElementSibling;
      if (secondTop) {
        const secondTopBtn = secondTop.querySelector(".top");
        secondTopBtn.classList.add("hidden");
      }
      const secondBottom = lastBannerCard.previousElementSibling;
      if (secondBottom) {
        const secondBottomBtn = secondBottom.querySelector(".bottom");
        secondBottomBtn.classList.add("hidden");
      }
  
    }

  }

}

// if(bannerCont.innerHTML != ""){
  setUpButtons();
// }


// hide down button for last banner card end

// admin / banner end


// admin / news
const tambahBeritaBtn = document.querySelector("#tambah-berita-btn");
const formTambahBerita = document.querySelector("#tambah-berita");
const formEditBerita = document.querySelector("#edit-berita");

const beritaRow = document.querySelectorAll("tr.berita-row");
if (tambahBeritaBtn != null) {
  const formEditBeritaPreview = formEditBerita.querySelector("img");

const formEditBeritaCloseBtn = formEditBerita.querySelector(".close-btn");
formEditBeritaCloseBtn.addEventListener("click",()=>{
  formEditBerita.classList.add("hidden");
  formEditBeritaPreview.classList.add("hidden");
  formEditBeritaPreview.src = "";
})
  tambahBeritaBtn.addEventListener("click", () => {
    formTambahBerita.classList.remove("hidden");
    const preview = formTambahBerita.querySelector("img.preview");
    const inputImage = formTambahBerita.querySelector("#file");
    inputImage.addEventListener("change", (event) => {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          preview.src = e.target.result;
          preview.classList.remove("hidden"); // Show the image
        };
        reader.readAsDataURL(file);
      }
    })


    const parent = formTambahBerita.parentElement;
    // parent.classList.remove("hidden");
    const closeBtn = formTambahBerita.querySelector(".close-btn");
    closeBtn.addEventListener("click", () => {
      // parent.classList.add("hidden");
      formTambahBerita.classList.add("hidden");
    })
  })
}


beritaRow.forEach((row) => {
  const menu = row.querySelector(".menu");
  row.addEventListener("mouseenter",()=>{
    menu.classList.remove("hidden");
  })
  row.addEventListener("mouseleave",()=>{
    menu.classList.add("hidden");
  })
  const judulBerita = row.dataset.name;
  const idBerita = row.dataset.id;
  const deleteBtn = row.querySelector(".delete");
  const editBtn = row.querySelector(".edit");
  editBtn.addEventListener("click",()=>{
    formEditBerita.classList.remove("hidden");
    const judulPost = formEditBerita.querySelector("#edit-judul");
    const isiPost = formEditBerita.querySelector("#edit-isi");
    const id = formEditBerita.querySelector(".input-id");
    id.value = idBerita;
    formEditBeritaPreview.src = baseURL +"public/assets/images/"+ row.dataset.image;
    formEditBeritaPreview.classList.remove("hidden");
    judulPost.value = judulBerita;
    isiPost.value = document.querySelector("#isi-"+idBerita).value;
  })


  deleteBtn.addEventListener("click", (e) => {
    Swal.fire({
      title: 'Hapus?',
      text: judulBerita + ' ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        // Redirect to your delete function or send an AJAX request
        window.location.href = baseURL + 'admin/news_delete/' + idBerita;
      }
    })
  })
})

// admin / news end


// notif
setTimeout(() => {
  // openNotif("hello");
}, 2000);
function openNotif(pesan) {
  delayTime = 1;
  const notif = document.querySelector(".notif");
  notif.innerHTML = pesan;
  notif.classList.add("down");
  setTimeout(() => {
    notif.classList.add("expand-flow");
  }, 200);
  setTimeout(() => {
    notif.classList.add("expand");
  }, 500);

  setTimeout(() => {
    notif.classList.remove("expand");
    notif.classList.remove("expand-flow");
  }, delayTime + 700);
  setTimeout(() => {
    notif.classList.remove("down");
  }, delayTime + 900);

}

// notif end

const body = document.querySelector("body");
body.classList.remove("overflow-y-h");