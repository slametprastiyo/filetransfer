export function init() {

}
export function update(featuredCat) {
    const featuredNavMenu = document.querySelectorAll(".featured-menu");
    const featuredContainer = document.querySelectorAll(".featured-container");
    featuredNavMenu.forEach((menu) => {
        if (menu.dataset.featured === featuredCat) {
            menu.classList.add("active");
            menu.classList.add("bg-secondary");
            menu.classList.add("text-white");
            menu.classList.add("font-bold");
            menu.classList.add("opacity-100");
            menu.classList.remove("opacity-75");
            menu.classList.remove("bg-secondary/30");
            menu.classList.remove("text-black");
        } else {
            menu.classList.remove("active");
            menu.classList.remove("bg-secondary");
            menu.classList.remove("text-white");
            menu.classList.remove("font-bold");
            menu.classList.remove("opacity-100");
            menu.classList.add("opacity-75");
            menu.classList.add("bg-secondary/30");
            menu.classList.add("text-black");
        }
    })
    featuredContainer.forEach((container) => {
        console.log(container);
        
        if (container.dataset.featured === featuredCat) {
            container.classList.remove("hidden");
        } else {
            container.classList.add("hidden");
        }
    })
}

// 0 -5px 10px  pink inset