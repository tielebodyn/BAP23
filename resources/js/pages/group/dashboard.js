import search from "../../components/search";

const inputElement = document.querySelector(".js-tag-input");
const tagListElement = document.querySelector(".js-tag-list");

const searchBarWrapper = document.querySelector(".js-searchbar-wrapper");

const initProfileTags = () => {
    inputElement.addEventListener("input", () => {
        search(inputElement, tagListElement, { showOnEmpty: true });
    });

};
document.addEventListener("click", (e) => {
    if (!searchBarWrapper.contains(e.target)) {
        searchBarWrapper.querySelector(".js-tag-list").classList.add("hidden");
    }
});
initProfileTags();
