const body = document.querySelector("body");
body.classList.remove("overflow-y-h");

const selectImageBtn = document.querySelector("#select-image");
const imageInput = document.querySelector("#image");
const saveBtn = document.getElementById("save-news-btn");
const submitBtn = document.getElementById("submit-news");
const popularTags = document.querySelectorAll(".tagar-populer .tagar");
const inputTag = document.getElementById("tags");

popularTags.forEach((tag) => {
    tag.addEventListener("click", () => {
        inputTag.value = inputTag.value + "," + tag.innerHTML;
        console.log(tag);
    });
});

selectImageBtn.addEventListener("click", () => {
    imageInput.click();
});
saveBtn.addEventListener("click", () => {
    submitBtn.click();
});

const img = document.getElementById("img-preview");
console.log(img);

imageInput.addEventListener("change", () => {
    const file = imageInput.files[0];
    const reader = new FileReader();

    reader.onload = () => {
        img.src = reader.result;
    };

    reader.readAsDataURL(file);
});

const additionalImageInput = document.getElementById("additionalImageInput");
const previewContainer = document.getElementById("additionalPreviewContainer");
let imagesArray = [];

additionalImageInput.addEventListener("change", (event) => {
    const newFiles = Array.from(event.target.files);

    // Append new images to the array
    imagesArray = newFiles;
    // imagesArray = imagesArray.concat(newFiles);

    displayPreview();

    // Reset input value so same file can be added again if needed
    // additionalImageInput.value = "";
});

function displayPreview() {
    previewContainer.innerHTML = "";

    imagesArray.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function (e) {
            const previewDiv = document.createElement("div");
            const wrapperDiv = document.createElement("div");
            wrapperDiv.className = "image-wrapper";
            wrapperDiv.classList.add(
                "h-48",
                "relative",
                "border",
                "border-secondary",
                "rounded-lg",
                "overflow-hidden",
            );

            const img = document.createElement("img");
            img.src = e.target.result;
            img.classList.add(
                "w-full",
                "h-full",
                "object-contain",
                "object-center",
            );

            // const button = document.createElement("button");
            // button.textContent = "Hapus";
            // button.classList.add(
            //     "absolute",
            //     "right-2",
            //     "top-2",
            //     "bg-red-400",
            //     "px-2",
            //     "py-1",
            //     "rounded-lg",
            //     "text-white",
            //     "text-xs",
            //     "border-0",
            // );
            // button.onclick = () => removeImage(index);

            wrapperDiv.appendChild(img);
            // wrapperDiv.appendChild(button);
            previewDiv.appendChild(wrapperDiv);
            previewContainer.appendChild(previewDiv);
        };
        reader.readAsDataURL(file);
    });
}

function removeImage(index) {
    imagesArray.splice(index, 1);
    displayPreview();
}
