import createMap from "../../components/mapbox/createMap";
import createMarker from "../../components/mapbox/createMarker";

// js-show-location
const mapContainer = document.querySelector(".js-group-location");
// select data-long
const zoom = 12;
const lng = parseFloat(mapContainer.dataset.long);
const lat = parseFloat(mapContainer.dataset.lat);

// create map
const map = createMap({
    mapElement: mapContainer,
    coordinates: [lng, lat],
    zoom: zoom,
    maxZoom: 12,
    minZoom: 12,
});
map.dragPan.disable();

const marker = createMarker({
    markup: `<span class="relative flex h-4 w-4">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-violet-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-4 w-4 bg-violet-500"></span>
        </span>`,
    coordinates: [lng, lat],
});
marker.setLngLat([lng, lat]).addTo(map);
