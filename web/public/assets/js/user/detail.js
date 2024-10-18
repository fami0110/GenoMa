// Init leaflet

const map_container = document.querySelector('#map');

if (map_container) {
    let title = map_container.dataset.title;
    let longitude = parseFloat(map_container.dataset.longitude);
    let latitude = parseFloat(map_container.dataset.latitude);

    let targetIcon = new L.Icon({
        iconUrl: '/assets/img/loc-marker.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -40],
    });
    
    let userIcon = new L.Icon({
        iconUrl: '/assets/img/user-marker.png',
        iconSize: [36, 36],
        iconAnchor: [18, 20],
        popupAnchor: [1, -20],
    });
    
    const map = L.map("map").setView([latitude, longitude], 13);
    
    L.tileLayer("https://mt1.google.com/vt/lyrs=r&x={x}&y={y}&z={z}", {
        maxZoom: 19,
    }).addTo(map);

    L.marker([latitude, longitude], {icon: targetIcon}).addTo(map)
        .bindPopup(`<b>${title}</b>`).openPopup();

    navigator.geolocation.getCurrentPosition(pos => {
        const user_lat = pos.coords.latitude;
        const user_long = pos.coords.longitude;

        L.polyline([
            [latitude, longitude],
            [user_lat, user_long]
        ]).addTo(map).setStyle({
            color: 'green'
        });

        const distance = map.distance(
            [latitude, longitude],
            [user_lat, user_long]
        );

        L.marker([user_lat, user_long], {icon: userIcon}).addTo(map)
            .bindPopup(`<h5>Your Current Position</h5>Distance to location: <b>${(distance/1000).toFixed(2)} km</b>`);

        map.setView([latitude, longitude], 13)
    });
}


document.querySelectorAll('.copy-btn').forEach(copy => {
    copy.addEventListener('click', () => {
        navigator.clipboard.writeText(copy.dataset.copy);
    });
});
