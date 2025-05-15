const body = document.querySelector("body");
body.classList.remove("overflow-y-h");

const selectImageBtn = document.querySelector("#select-image");
const imageInput = document.querySelector("#image");
const saveBtn = document.getElementById("save-news-btn");
const submitBtn = document.getElementById("submit-news");
const popularTags = document.querySelectorAll(".tagar-populer .tagar");
const inputTag = document.getElementById("tags");

popularTags.forEach((tag)=>{
    tag.addEventListener("click",()=>{
        inputTag.value = inputTag.value +","+ tag.innerHTML;
        console.log(tag);
    })
    
})

selectImageBtn.addEventListener("click", () => {
    imageInput.click();
})
saveBtn.addEventListener("click", () => {
    submitBtn.click();
})

const img = document.getElementById("img-preview");
console.log(img);

imageInput.addEventListener("change", () => {
    const file = imageInput.files[0];
    const reader = new FileReader();

    reader.onload = () => {
        img.src = reader.result;
    }

    reader.readAsDataURL(file);
})