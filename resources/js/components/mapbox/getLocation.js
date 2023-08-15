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

export default getLocation;
