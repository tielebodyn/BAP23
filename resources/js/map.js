import "mapbox-gl/dist/mapbox-gl.css";
import mapboxgl from "mapbox-gl";

const activePostWrapper = document.querySelector(".js-active-posts");
const activePosts = activePostWrapper.querySelectorAll("li");

const loadMap = (location) => {
    const { lng, lat, zoom } = location;
    mapboxgl.accessToken = import.meta.env.VITE_MAPBOX_TOKEN;
    const map = new mapboxgl.Map({
        container: "map", // container ID
        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        style: "mapbox://styles/mapbox/streets-v12", // style URL
        center: [lng ?? 4.4478, lat ?? 51.095], // starting position [lng, lat]
        zoom: zoom ?? 12, // starting zoom
        maxZoom: 14,
    });
    const markers = [];

    const createMarker = ({
        coordinates = null,
        popupHtml = null,
        markerMarkup = "",
        location = false,
    }) => {
        const el = document.createElement("div");
        el.innerHTML = markerMarkup;
        // TODO: add popup to marker
        let popup = new mapboxgl.Popup({ offset: 0 }).setHTML(popupHtml);
        if(location) {
            popup = null;
        }
        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el)
            .setLngLat(coordinates)
            .setPopup(popup) // sets a popup on this marker
            .addTo(map);
        !location && markers.push(el);
    };
    activePosts.forEach((post) => {
    const long = post.getAttribute('data-long');
    const lat = post.getAttribute('data-lat');
     createMarker({
        coordinates: [long, lat],
        popupHtml: `${post.innerHTML}`,
        markerMarkup:
            '<div class="bg-violet-400 bg-opacity-25 w-11 h-11 rounded-full border-4 border-white js-map-marker"> </div>',
    });

    });

    // create marker wit current location
    if (location.success) {
        createMarker({
            coordinates: [lng, lat],
            markerMarkup: `
        <span class="relative flex h-6 w-6">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-violet-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-6 w-6 bg-violet-500"></span>
        </span>`,
            location: true,
        });
    }
    map.on("zoom", () => {
        // TODO: change marker size so it stays consistent
        markers.forEach((marker) => {
            const markerElement = marker.querySelector(".js-map-marker");
            markerElement.style.width = `${map.getZoom() * 5}px`;
            markerElement.style.height = `${map.getZoom() * 5}px`;

        });
    });
};

const getLocation = async () => {
    const options = {
        enableHighAccuracy: true,
    };
    try {
        const position = await new Promise((resolve, reject) => {
            navigator.geolocation.getCurrentPosition(resolve, reject, options);
        });
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        return {
            success: true,
            error: null,
            lat: latitude,
            lng: longitude,
            zoom: 12,
        };
    } catch (error) {
        return {
            success: false,
            error: error.message,
            lat: null,
            lng: null,
            zoom: 9,
        };
    }
};

(async () => {
    try {
        const location = await getLocation();
        loadMap(location);
    } catch (error) {
        console.error(error);
    }
})();
