"use strict";
const departIcon = L.icon({
    iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
    iconSize: [32, 32],
    iconAnchor: [16, 32],
    popupAnchor: [0, -32]
});
const arriveeIcon = L.icon({
    iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
    iconSize: [32, 32],
    iconAnchor: [16, 32],
    popupAnchor: [0, -32],
    className: 'arrivee-icon'
});
const map = L.map('map').setView([14.6937, -17.4441], 6);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);
const groupMarkers = L.featureGroup().addTo(map);
async function loadCargaisons() {
    try {
        const response = await fetch('http://localhost:3001/cargaisons');
        const cargaisons = await response.json();
        cargaisons.forEach(cargaison => {
            var _a, _b;
            if (((_a = cargaison.trajet) === null || _a === void 0 ? void 0 : _a.depart) && ((_b = cargaison.trajet) === null || _b === void 0 ? void 0 : _b.arrivee)) {
                L.marker([cargaison.trajet.depart.lat, cargaison.trajet.depart.lng], { icon: departIcon }).bindPopup(`
                    <b>Départ</b><br>
                    Cargaison: ${cargaison.id}<br>
                    Status: ${cargaison.etat_global}
                `).addTo(groupMarkers);
                L.marker([cargaison.trajet.arrivee.lat, cargaison.trajet.arrivee.lng], { icon: arriveeIcon }).bindPopup(`
                    <b>Arrivée</b><br>
                    Cargaison: ${cargaison.id}<br>
                    Status: ${cargaison.etat_global}
                `).addTo(groupMarkers);
                L.polyline([
                    [cargaison.trajet.depart.lat, cargaison.trajet.depart.lng],
                    [cargaison.trajet.arrivee.lat, cargaison.trajet.arrivee.lng]
                ], {
                    color: cargaison.etat_global === 'en_cours' ? 'blue' : 'gray',
                    weight: 3,
                    dashArray: cargaison.etat_global === 'en_cours' ? '5, 5' : undefined
                }).addTo(groupMarkers);
            }
        });
        map.fitBounds(groupMarkers.getBounds());
    }
    catch (error) {
        console.error('Erreur lors du chargement des cargaisons:', error);
    }
}
loadCargaisons();
