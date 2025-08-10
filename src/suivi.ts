// Déclaration pour Leaflet (chargé via CDN)
declare var L: any;

// Interfaces pour typer les données
interface Expediteur {
    nom: string;
    localisation: string;
    telephone: string;
}

interface Destinataire {
    nom: string;
    localisation: string;
    telephone: string;
}

interface Details {
    poids: string;
    type: string;
    prix: string;
}

interface TimelineItem {
    statut: string;
    description: string;
    date: string;
    details?: string;
    completed: boolean;
    current?: boolean;
}

interface Colis {
    id: string;
    expediteur: Expediteur;
    destinataire: Destinataire;
    details: Details;
    statut: string;
    derniere_mise_a_jour: string;
    date_expedition: string;
    date_arrivee_prevue: string;
    position_actuelle: string;
    cargaison_id: string;
    timeline: TimelineItem[];
}

interface Cargaison {
    id: string;
    etat_global: string;
    trajet?: {
        depart: { lat: number; lng: number };
        arrivee: { lat: number; lng: number };
    };
}

// Variables globales
let mapInstance: any = null;
let currentColis: Colis | null = null;

// Éléments DOM
const formulaire = document.querySelector('#trackingForm') as HTMLFormElement;
const champCode = document.querySelector('#trackingCode') as HTMLInputElement;
const sectionResultat = document.querySelector('#resultat-section') as HTMLElement;
const sectionNonTrouve = document.querySelector('#non-trouve-section') as HTMLElement;

// Initialisation
document.addEventListener('DOMContentLoaded', () => {
    if (formulaire) {
        formulaire.addEventListener('submit', rechercherColis);
    }
    
    // Masquer les sections de résultat au démarrage
    if (sectionResultat) sectionResultat.style.display = 'none';
    if (sectionNonTrouve) sectionNonTrouve.style.display = 'none';
});

async function rechercherColis(e: Event): Promise<void> {
    e.preventDefault();
    
    const codeRecherche = champCode?.value.trim();
    if (!codeRecherche) return;

    try {
        console.log('Recherche du colis:', codeRecherche);
        
        // Récupérer les colis depuis l'API
        const response = await fetch(`http://localhost:3001/colis`);
        if (!response.ok) {
            throw new Error(`Erreur HTTP: ${response.status}`);
        }
        
        const tousLesColis: Colis[] = await response.json();
        console.log('Colis reçus:', tousLesColis);
        
        // Rechercher le colis correspondant
        const colistrouve = tousLesColis.find(colis => colis.id === codeRecherche);
        
        if (colistrouve) {
            console.log('Colis trouvé:', colistrouve);
            currentColis = colistrouve;
            afficherColisDetails(colistrouve);
            await afficherCarteColis(colistrouve);
        } else {
            console.log('Colis non trouvé');
            afficherColisNonTrouve();
        }
        
    } catch (error) {
        console.error('Erreur lors de la recherche:', error);
        afficherErreurRecherche();
    }
}

function afficherColisDetails(colis: Colis): void {
    // Masquer section non trouvé et afficher section résultat
    if (sectionNonTrouve) sectionNonTrouve.style.display = 'none';
    if (sectionResultat) sectionResultat.style.display = 'block';
    
    // Mettre à jour le code de suivi
    const elementCode = document.querySelector('#colis-code');
    if (elementCode) elementCode.textContent = colis.id;
    
    // Mettre à jour la timeline
    const containerTimeline = document.querySelector('#timeline-container');
    if (containerTimeline) {
        containerTimeline.innerHTML = '';
        
        colis.timeline.forEach(item => {
            const elementTimeline = creerElementTimeline(item);
            containerTimeline.appendChild(elementTimeline);
        });
    }
    
    // Mettre à jour les détails expéditeur
    const nomExpediteur = document.querySelector('#expediteur-nom');
    const localisationExpediteur = document.querySelector('#expediteur-localisation');
    const telephoneExpediteur = document.querySelector('#expediteur-telephone');
    
    if (nomExpediteur) nomExpediteur.textContent = colis.expediteur.nom;
    if (localisationExpediteur) localisationExpediteur.textContent = colis.expediteur.localisation;
    if (telephoneExpediteur) telephoneExpediteur.textContent = colis.expediteur.telephone;
    
    // Mettre à jour les détails destinataire
    const nomDestinataire = document.querySelector('#destinataire-nom');
    const localisationDestinataire = document.querySelector('#destinataire-localisation');
    const telephoneDestinataire = document.querySelector('#destinataire-telephone');
    
    if (nomDestinataire) nomDestinataire.textContent = colis.destinataire.nom;
    if (localisationDestinataire) localisationDestinataire.textContent = colis.destinataire.localisation;
    if (telephoneDestinataire) telephoneDestinataire.textContent = colis.destinataire.telephone;
    
    // Mettre à jour les détails du colis
    const poidsColis = document.querySelector('#colis-poids');
    const typeColis = document.querySelector('#colis-type');
    const prixColis = document.querySelector('#colis-prix');
    
    if (poidsColis) poidsColis.textContent = `Poids: ${colis.details.poids}`;
    if (typeColis) typeColis.textContent = `Type: ${colis.details.type}`;
    if (prixColis) prixColis.textContent = `Prix: ${colis.details.prix}`;
}

function creerElementTimeline(item: TimelineItem): HTMLElement {
    const div = document.createElement('div');
    div.className = 'relative flex items-center mb-6';
    
    const iconClass = item.completed ? (item.current ? 'bg-sage-500 animate-pulse' : 'bg-green-500') : 'bg-gray-300';
    const textClass = item.completed ? (item.current ? 'text-sage-600' : 'text-gray-900') : 'text-gray-400';
    
    div.innerHTML = `
        <div class="w-8 h-8 ${iconClass} rounded-full flex items-center justify-center z-10">
            ${item.completed ? 
                `<svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>` : 
                `<div class="w-2 h-2 bg-gray-500 rounded-full"></div>`
            }
        </div>
        <div class="ml-4">
            <div class="font-semibold ${textClass}">${item.description}</div>
            <div class="text-sm text-gray-500">${item.date}</div>
            ${item.details ? `<div class="text-sm ${item.current ? 'text-sage-600' : 'text-gray-600'} font-medium">${item.details}</div>` : ''}
        </div>
    `;
    
    return div;
}

function afficherColisNonTrouve(): void {
    if (sectionResultat) sectionResultat.style.display = 'none';
    if (sectionNonTrouve) sectionNonTrouve.style.display = 'block';
}

function afficherErreurRecherche(): void {
    if (sectionResultat) sectionResultat.style.display = 'none';
    if (sectionNonTrouve) {
        sectionNonTrouve.style.display = 'block';
        const titre = sectionNonTrouve.querySelector('h3');
        const message = sectionNonTrouve.querySelector('p');
        
        if (titre) titre.textContent = 'Erreur de connexion';
        if (message) message.textContent = 'Impossible de se connecter au serveur. Vérifiez votre connexion internet.';
    }
}

async function afficherCarteColis(colis: Colis): Promise<void> {
    try {
        // Récupérer les détails de la cargaison
        const response = await fetch(`http://localhost:3001/cargaisons`);
        if (!response.ok) return;
        
        const cargaisons: Cargaison[] = await response.json();
        const cargaison = cargaisons.find(c => c.id === colis.cargaison_id);
        
        if (!cargaison || !cargaison.trajet) return;
        
        // Créer ou mettre à jour la carte
        const elementCarte = document.querySelector('#map');
        if (!elementCarte) return;
        
        // Détruire la carte existante si elle existe
        if (mapInstance) {
            mapInstance.remove();
        }
        
        // Créer nouvelle carte
        mapInstance = L.map('map').setView([14.6937, -17.4441], 4);
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(mapInstance);
        
        // Ajouter marqueurs
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
        
        // Marqueur départ
        L.marker([cargaison.trajet.depart.lat, cargaison.trajet.depart.lng], { icon: departIcon })
            .bindPopup(`<b>Départ</b><br>Colis: ${colis.id}<br>Expéditeur: ${colis.expediteur.nom}`)
            .addTo(mapInstance);
        
        // Marqueur arrivée
        L.marker([cargaison.trajet.arrivee.lat, cargaison.trajet.arrivee.lng], { icon: arriveeIcon })
            .bindPopup(`<b>Destination</b><br>Colis: ${colis.id}<br>Destinataire: ${colis.destinataire.nom}`)
            .addTo(mapInstance);
        
        // Ligne de trajet
        const couleur = colis.statut === 'en_transit' ? 'blue' : (colis.statut === 'arrive' ? 'green' : 'gray');
        L.polyline([
            [cargaison.trajet.depart.lat, cargaison.trajet.depart.lng],
            [cargaison.trajet.arrivee.lat, cargaison.trajet.arrivee.lng]
        ], {
            color: couleur,
            weight: 4,
            dashArray: colis.statut === 'en_transit' ? '10, 5' : undefined
        }).addTo(mapInstance);
        
        // Ajuster la vue pour inclure tous les marqueurs
        const group = L.featureGroup([
            L.marker([cargaison.trajet.depart.lat, cargaison.trajet.depart.lng]),
            L.marker([cargaison.trajet.arrivee.lat, cargaison.trajet.arrivee.lng])
        ]);
        mapInstance.fitBounds(group.getBounds().pad(0.1));
        
    } catch (error) {
        console.error('Erreur lors de l\'affichage de la carte:', error);
    }
}
