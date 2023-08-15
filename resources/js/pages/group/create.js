// imports
import createMap from "../../components/mapbox/createMap";
import createGeocoder from "../../components/mapbox/createGeocoder";
import createEditor from "../../components/froala/createEditor";

// Initialize editor.
createEditor("#edit");

const mapElement = document.querySelector("#map");
const map = createMap({
    mapElement,
    zoom: 8,
    maxZoom: 14,
    minZoom: 6,
});

// data-long and data-lat
const customMarker = document.createElement("div");
customMarker.className = "custom-marker";
customMarker.innerHTML =
    '<div class="bg-violet-400 bg-opacity-25 w-11 h-11 rounded-full border-4 border-white js-map-marker"> </div>';

// Attach the Mapbox Geocoder control to the map
const geocoder = createGeocoder(customMarker);
geocoder.setTypes("place, locality, postcode, region");
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
