import search from "../components/search";

const inputElement = document.querySelector(".js-tag-input");
const tagListElement = document.querySelector(".js-tag-list");
const selectedTagListElement = document.querySelector(".js-selected-tags");
const tags = document.querySelectorAll(".js-tag");
const searchBarWrapper = document.querySelector(".js-searchbar-wrapper");

const initProfileTags = () => {
    inputElement.addEventListener("input", () => {
        search(inputElement, tagListElement, { showOnEmpty: true });
    });

    tags.forEach((tag) => {
        tag.addEventListener("click", () => {
            const dataTagID = tag.getAttribute("data-tag-id");
            const tagInputElement = tag.querySelector(`.js-tag-${dataTagID}`);
            inputElement.value = "";
            inputElement.focus();
            if (tag.parentElement === selectedTagListElement) {
                tagListElement.appendChild(tag);
                tagInputElement.checked = false;
            } else {
                selectedTagListElement.appendChild(tag);
                tagInputElement.checked = true;
            }
        });
    });
};
document.addEventListener("click", (e) => {
    if (!searchBarWrapper.contains(e.target)) {
        searchBarWrapper.querySelector(".js-tag-list").classList.add("hidden");
    }
});
initProfileTags();
