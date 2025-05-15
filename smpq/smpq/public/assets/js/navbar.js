import wiggle from './wiggle.js';

export default function navbar() {
    const searchInput = document.querySelector("#search-mobile");
    const searchbar = searchInput.parentElement;
    const mobileMenu = document.querySelectorAll(".mobile-menu");
    const allDropdownParent = document.querySelectorAll(".dropdown.parent-menu");
    
    searchInput.addEventListener("focus",()=>{
        wiggle();
        
        
    allDropdownParent.forEach((parent)=>{
        const child = parent.querySelectorAll(".child-menu");
child.forEach((ch)=>{
    ch.classList.remove("active");
                    ch.classList.add("scale-0");
                    ch.classList.add("translate-y-40");

})
    })
    })
    // searchInput.addEventListener("blur",()=>{
    //     setTimeout(() => {
    //     searchbar.classList.remove("w-48");
            
    //     }, 250);
    //         mobileMenu.forEach((m)=>{
    //             m.classList.remove("absolute");
    //         })
    //         setTimeout(() => {
    //             mobileMenu.forEach((m)=>{
    //                 m.classList.remove("hidden");
    //              })
                 
    //          }, 200);
    // })
    
    allDropdownParent.forEach((parent)=>{
        if(parent.classList.contains("parent-menu-mobile")){
            const child = parent.querySelectorAll(".child-menu");
            parent.addEventListener("click",()=>{
               wiggle();
                
                child.forEach((ch)=>{
                    if(!ch.classList.contains("active")){
                        ch.classList.add("active");
                        ch.classList.remove("scale-0");
                        ch.classList.remove("translate-y-40");
                        
                    }else{
                        ch.classList.remove("active");
                        ch.classList.add("scale-0");
                        ch.classList.add("translate-y-40");
                    }                    
                })
            })

        }else{
            const child = parent.querySelectorAll(".child-menu");
            parent.addEventListener("mouseenter",()=>{
                child.forEach((ch)=>{
                    
                    ch.classList.remove("hidden");
                })
            })
            parent.addEventListener("mouseleave",()=>{
                child.forEach((ch)=>{
                    ch.classList.add("hidden");
                })
            })

        }
    })
  }