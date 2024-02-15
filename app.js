document.addEventListener('DOMContentLoaded', function () {
    const map = L.map('map').setView([19.0760, 72.8777], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    function fetchChargingStations(latitude, longitude) {
        const distance = 10;
        const maxResults = 20;

        const apiUrl = `https://api.openchargemap.io/v3/poi/?output=json&latitude=${latitude}&longitude=${longitude}&distance=${distance}&maxresults=${maxResults}`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                data.forEach(station => {
                    if (station.AddressInfo) {
                        const { Latitude, Longitude, Title } = station.AddressInfo;
                        L.marker([Latitude, Longitude], {
                            icon: L.icon({
                                iconUrl: 'charging_station_icon.png',
                                iconSize: [25, 41],
                                iconAnchor: [12, 41],
                                popupAnchor: [1, -34],
                                shadowSize: [41, 41]
                            })
                        }).addTo(map)
                            .bindPopup(Title || 'Charging Station');
                    }
                });
            })
            .catch(error => console.error('Error:', error));
    }

    fetchChargingStations(19.0760, 72.8777);
});
