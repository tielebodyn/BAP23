import mapboxgl from "mapbox-gl";
const createMarker = ({
    markup = ` <span class="relative flex h-6 w-6">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-violet-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-6 w-6 bg-violet-500"></span>
        </span>`,
    coordinates = "",
    className= "custom-marker"
}) => {
    const customMarker = document.createElement("div");
    customMarker.className = className;
    customMarker.innerHTML = markup;
    // Create a default Marker and add it to the map.
    const marker = new mapboxgl.Marker(customMarker);
    marker.setLngLat(coordinates);
    return marker;
};
export default createMarker;
