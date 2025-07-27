export default function navigasiFontSize(){
    const nav = document.querySelector("nav.navigasi-baru");
    const a = nav.querySelectorAll("a");
    a.forEach((a)=>{        
        const span = a.querySelector("span");
        // console.log(window.getComputedStyle(span).fontSize);
        // console.log(parseFloat(window.getComputedStyle(span).fontSize));
        
        // if(span.innerHTML.length > 7){
        //     span.style.fontSize = parseFloat(window.getComputedStyle(span).fontSize) * 0.75 + "px";
        // }
    })
}