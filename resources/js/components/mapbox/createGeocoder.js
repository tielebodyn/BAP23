import MapboxGeocoder from "@mapbox/mapbox-gl-geocoder";
import mapboxgl from "mapbox-gl";
const createGeocoder = (customMarker) => {
const geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    mapboxgl: mapboxgl,
    language: "nl", // Set the language response text language to Dutch
    countries: "be", // Filter by Belgium
    // set pointer html
    marker: {
        draggable: false,
        element: customMarker,
    },
});
    return geocoder;
};
export default createGeocoder;

