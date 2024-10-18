// Init leaflet

const map_container = document.querySelector('#map');
if (map_container) {
    let title = map_container.dataset.title;
    let longitude = parseFloat(map_container.dataset.longitude);
    let latitude = parseFloat(map_container.dataset.latitude);
    
    const map = L.map("map").setView([latitude, longitude], 13);
    
    L.tileLayer("https://mt1.google.com/vt/lyrs=r&x={x}&y={y}&z={z}", {
        maxZoom: 19,
    }).addTo(map);

    var marker = L.marker([latitude, longitude]).addTo(map);
    marker.bindPopup(title).openPopup();
}


document.querySelectorAll('.copy-btn').forEach(copy => {
    copy.addEventListener('click', () => {
        navigator.clipboard.writeText(copy.dataset.copy);
    });
});
