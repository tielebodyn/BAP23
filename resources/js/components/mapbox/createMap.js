// mapbox
import mapboxgl from "mapbox-gl";
import "mapbox-gl/dist/mapbox-gl.css";
import "@mapbox/mapbox-gl-geocoder/dist/mapbox-gl-geocoder.css";

const createMap = ({
    mapElement,
    coordinates = [4.4478, 51.095],
    zoom = 12,
    maxZoom = 14,
    minZoom = 12,
}) => {
    mapboxgl.accessToken = import.meta.env.VITE_MAPBOX_TOKEN;
    const map = new mapboxgl.Map({
        container: mapElement,
        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        style: "mapbox://styles/mapbox/streets-v12",
        center: coordinates,
        zoom: zoom,
        maxZoom: maxZoom,
        minZoom: minZoom,
    });
    return map;
};

export default createMap;
