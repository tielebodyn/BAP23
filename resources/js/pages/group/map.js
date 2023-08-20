import "mapbox-gl/dist/mapbox-gl.css";
import mapboxgl from "mapbox-gl";
import createMap from "../../components/mapbox/createMap";
import getLocation from "../../components/mapbox/getLocation";
import createMarker from "../../components/mapbox/createMarker";

const activePostWrapper = document.querySelector(".js-active-posts");
const activePosts = activePostWrapper.querySelectorAll("li");

const loadMap = (location) => {
    const { lng, lat, zoom } = location;

    const map = createMap({
        mapElement: "map",
        coordinates: [lng, lat],
        zoom: zoom,
        maxZoom: 14,
        minZoom: 8,
    });

    const markers = [];
    // create markers for posts
    activePosts.forEach((post) => {
        const long = post.getAttribute("data-long");
        const lat = post.getAttribute("data-lat");
        const marker = createMarker({
            coordinates: [long, lat],
            markup: '<div class="bg-violet-400 bg-opacity-25 w-11 h-11 rounded-full border-4 border-white js-map-marker"> </div>',
        });
        let popup = new mapboxgl.Popup({ offset: 0 }).setHTML(post.innerHTML);
        marker.setPopup(popup);
        marker.addTo(map);
        // set htmlMarker to html of marker
        const htmlMarker = marker.getElement();
        markers.push(htmlMarker);
    });

    // create marker wit current location
    if (location.success) {
        const marker = createMarker({
            coordinates: [lng, lat],
        });
        marker.addTo(map);
    }
    map.on("zoom", () => {
        markers.forEach((marker) => {
            const markerElement = marker.querySelector(".js-map-marker");
            markerElement.style.width = `${map.getZoom() * 5}px`;
            markerElement.style.height = `${map.getZoom() * 5}px`;
        });
    });
};

(async () => {
    try {
        const location = await getLocation();
        loadMap(location);
    } catch (error) {
        console.error(error);
    }
})();
