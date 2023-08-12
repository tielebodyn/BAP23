const fileInputWrapper = document.querySelectorAll(".js-file-input-wrapper");
const uploadImage = (fileInputWrapper) => {
    const fileInputElement = fileInputWrapper.querySelector(".js-file-input");
    const maxImageAmount = fileInputElement.getAttribute("data-max-amount");
    const removeButton = fileInputWrapper.querySelector(".js-remove-file");
    const previewWrapper = fileInputWrapper.querySelector(".preview-wrapper");
    const errorElement = fileInputWrapper.querySelector(".js-error-message");
    fileInputElement.addEventListener("change", (e) => {
        // if file above maxImageAmount reset
        if (e.target.files.length > maxImageAmount) {
            fileInputElement.value = "";
            errorElement.innerText = `Je kan maximaal ${maxImageAmount} bestanden uploaden.`;
            errorElement.classList.remove("hidden");
            setTimeout(() => {
                errorElement.classList.add("hidden");
            }, 3000);

            return;
        }
        removeButton.classList.remove("opacity-30");
        removeButton.classList.add("opacity-100");
        const files = fileInputElement.files;
        hideDefault(previewWrapper);
        for (let i = 0; i < files.length; i++) {
            const previewImg = document.createElement("img");
            previewImg.src = URL.createObjectURL(e.target.files[i]);
            previewImg.classList.add("max-h-40", "w-full", "object-contain", "js-image-default");
            previewWrapper.appendChild(previewImg);
            previewImg.onload = function () {
                URL.revokeObjectURL(previewImg.src); // free memory
            };
        }
    });
    removeButton.addEventListener("click", (e) => {
        fileInputElement.value = "";
        removeButton.classList.add("opacity-30");
        hideDefault(previewWrapper);
        // create amount of divs depending on maxImageAmount
        for (let i = 0; i < maxImageAmount; i++) {
            const div = document.createElement("div");
            div.classList.add("bg-gray-100", "h-40", "js-image-default");
            previewWrapper.appendChild(div);
        }
    });
    const hideDefault = (previewWrapper) => {

    previewWrapper.querySelectorAll(".js-image-default").forEach((element) => {
            element.classList.add("hidden");
        });
    };

};

fileInputWrapper.forEach((fileInputWrapper) => {
    uploadImage(fileInputWrapper);
});
