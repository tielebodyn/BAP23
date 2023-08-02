const loadMap = (lng, lat, zoom) => {
mapboxgl.accessToken = import.meta.env.VITE_MAPBOX_TOKEN;
const map = new mapboxgl.Map({
    container: "map", // container ID
    // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
    style: "mapbox://styles/mapbox/streets-v12", // style URL
    center: [lng ?? 4.4478, lat ?? 51.0950], // starting position [lng, lat]
    zoom: zoom ?? 12, // starting zoom
});
const markers = [];
// Set marker options.
const marker = new mapboxgl.Marker({
// TODO: add ping to current location
color: "#FFFFFF",
draggable: false
}).setLngLat([lng ?? 4.4478 , lat ?? 51.0950])
.addTo(map);
markers.push(marker);



const geojson = {
  type: 'FeatureCollection',
  features: [
    {
      type: 'Feature',
      geometry: {
        type: 'Point',
        coordinates: [3.5643, 50.8138]
      },
      properties: {
        title: 'Mapbox',
        description: 'Washington, D.C.'
      }
    },
    {
      type: 'Feature',
      geometry: {
        type: 'Point',
        coordinates: [-122.414, 37.776]
      },
      properties: {
        title: 'Mapbox',
        description: 'San Francisco, California'
      }
    }
  ]
};

// add markers to map
for (const feature of geojson.features) {
  // create a HTML element for each feature
  const el = document.createElement('div');
  el.className = 'bg-accent bg-opacity-25 w-20 h-20 rounded-full border-4 border-white';

  // make a marker for each feature and add to the map
  new mapboxgl.Marker(el).setLngLat(feature.geometry.coordinates).addTo(map);
  markers.push(el);
}
map.on('zoom', () => {
// TODO: change marker size so it stays consistent
// console.log(map.getZoom());

});
};

// TODO: add popup to marker


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
        const {lng, lat, zoom} = location;
        loadMap(lng, lat, zoom);
    } catch (error) {
        console.error(error);
    }
})();



