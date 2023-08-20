import "mapbox-gl/dist/mapbox-gl.css";
import "@mapbox/mapbox-gl-geocoder/dist/mapbox-gl-geocoder.css";
import search from "../components/search";

const inputElement = document.querySelector(".js-category-input");
const tagListElement = document.querySelector(".js-category-list");
const selectedTagListElement = document.querySelector(
    ".js-selected-categories"
);
const categories = document.querySelectorAll(".js-category");
const searchBarWrapper = document.querySelector(".js-searchbar-wrapper");
const imageSelect = document.querySelector(".js-image-select");
const typeSelect = document.querySelector(".js-type-select");
const description = document.querySelector(".js-description");
const priceInput = document.querySelector(".js-price-input");
const tradeOptions = document.querySelector(".js-trade-options");

if(typeSelect.value == "vraag"){
    description.innerText += " (beschrijf naar wat je op zoek bent)";
    tradeOptions.classList.remove("hidden");
}
if(typeSelect.value == "aanbod"){
    description.innerText += " (beschrijf wat je in de aanbieding hebt)";
    priceInput.classList.remove("hidden");
    tradeOptions.classList.remove("hidden");
    imageSelect.classList.remove("hidden");
}

typeSelect.addEventListener("change", (e) => {
    imageSelect.classList.add("hidden");
    priceInput.classList.remove("hidden");
    description.innerText = "Beschrijving";
    tradeOptions.classList.add("hidden");
    const value = e.target.value;
    if (value == "vraag") {
        description.innerText += " (beschrijf naar wat je op zoek bent)";
        tradeOptions.classList.remove("hidden");
    }
    if (value == "aanbod") {
        description.innerText += " (beschrijf wat je in de aanbieding hebt)";
        priceInput.classList.remove("hidden");
        tradeOptions.classList.remove("hidden");
        imageSelect.classList.remove("hidden");
    }
});

const initProfilecategories = () => {
    inputElement.addEventListener("input", () => {
        search(inputElement, tagListElement, { showOnEmpty: true });
    });

    categories.forEach((category) => {
        category.addEventListener("click", () => {
            const dataTagID = category.getAttribute("data-category-id");
            const tagInputElement = category.querySelector(
                `.js-category-${dataTagID}`
            );
            inputElement.value = "";
            inputElement.focus();
            if (category.parentElement === selectedTagListElement) {
                tagListElement.appendChild(category);
                tagInputElement.checked = false;
            } else {
                selectedTagListElement.appendChild(category);
                tagInputElement.checked = true;
            }
        });
    });
};
document.addEventListener("click", (e) => {
    if (!searchBarWrapper.contains(e.target)) {
        searchBarWrapper
            .querySelector(".js-category-list")
            .classList.add("hidden");
    }
});
initProfilecategories();
