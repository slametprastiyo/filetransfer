export default function wiggle(){
    const navbar = document.querySelectorAll("nav.navigasi-baru");
    navbar.forEach((nav)=>{
        nav.classList.add("wiggle");
        setTimeout(() => {
            nav.classList.remove("wiggle");
            
        }, 750);

    })

}