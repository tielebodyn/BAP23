import mapboxgl from "mapbox-gl";
import "mapbox-gl/dist/mapbox-gl.css";
import MapboxGeocoder from "@mapbox/mapbox-gl-geocoder";
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



mapboxgl.accessToken = import.meta.env.VITE_MAPBOX_TOKEN;
const map = new mapboxgl.Map({
    container: "map",
    // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
    style: "mapbox://styles/mapbox/streets-v12",
    center: [4.4478, 51.095],
    zoom: 12,
    maxZoom: 14,
    minZoom: 6,
});

const customMarker = document.createElement("div");
customMarker.className = "custom-marker";
customMarker.innerHTML =
    '<div class="bg-violet-400 bg-opacity-25 w-11 h-11 rounded-full border-4 border-white js-map-marker"> </div>';

const geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    mapboxgl: mapboxgl,
    language: "nl", // Set the language response text language to Dutch
    countries: "be", // Filter by Belgium
    types: "address",
    // set pointer html
    marker: {
        draggable: false,
        element: customMarker,
    },
});

// Attach the Mapbox Geocoder control to the map
map.addControl(geocoder);
geocoder.on("result", function (e) {
    document.querySelector(".js-long-input").value = e.result.center[0];
    document.querySelector(".js-lat-input").value = e.result.center[1];
    // place_name_nl
    document.querySelector(".js-place-input").value = e.result.place_name_nl;
});
map.on("zoom", () => {
    const markerElement = customMarker.querySelector(".js-map-marker");
    markerElement.style.width = `${map.getZoom() * 5}px`;
    markerElement.style.height = `${map.getZoom() * 5}px`;
});
