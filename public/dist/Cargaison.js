import { EtatGlobal } from "./EtatGlobal";
export class Cargaison {
    constructor(id, numero, poidsMax, typeCargaison, lieu_depart, lieu_arriver, distance, date_depart, date_arrivee) {
        this.colis = [];
        this.id = id;
        this.numero = numero;
        this.poidsMax = poidsMax;
        this.typeCargaison = typeCargaison;
        this.lieu_depart = lieu_depart;
        this.lieu_arriver = lieu_arriver;
        this.distance = distance;
        this.date_depart = date_depart;
        this.date_arrivee = date_arrivee;
        this.etatGlobal = EtatGlobal.OUVERT;
        this.prix = 0;
        this.etatAvancement = "en_attente";
    }
    addColis(colis) {
        if (this.etatGlobal === EtatGlobal.OUVERT) {
            this.colis.push(colis);
            this.updatePrix();
        }
    }
    getColis() {
        return this.colis;
    }
    fermer() {
        this.etatGlobal = EtatGlobal.FERMER;
    }
    // Méthode pour vérifier l'état d'avancement
    getEtatAvancement() {
        return this.etatAvancement;
    }
    // Méthode pour changer l'état d'avancement
    setEtatAvancement(etat) {
        this.etatAvancement = etat;
    }
    // Méthode pour rouvrir la cargaison si en attente
    ouvrir() {
        if (this.etatAvancement === "en_attente") {
            this.etatGlobal = EtatGlobal.OUVERT;
        }
    }
    // Méthode statique pour lister les cargaisons depuis db.json
    static async listerCargaisons() {
        const response = await fetch("/db.json");
        const data = await response.json();
        return data.cargaisons.map((c) => new Cargaison(c.id, c.numero, c.poidsMax, c.typeCargaison, c.lieu_depart, c.lieu_arriver, c.distance, new Date(c.date_depart), new Date(c.date_arrivee)));
    }
    // Méthode statique pour créer une nouvelle cargaison
    static async creerCargaison(cargaison) {
        const response = await fetch("/db.json");
        const data = await response.json();
        data.cargaisons.push(cargaison);
        await fetch("/db.json", {
            method: "PUT",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(data)
        });
    }
    updatePrix() {
        this.prix = this.colis.reduce((total, c) => total + c.getPrix(), 0);
    }
    getPrix() {
        return this.prix;
    }
    
}

// Code global à placer après la classe
async function afficherListeCargaisons() {
    try {
        const response = await fetch('/db.json');
        if (!response.ok) throw new Error('Erreur HTTP: ' + response.status);
        const data = await response.json();
        const cargaisons = data.cargaisons;
        const tableBody = document.querySelector('#cargaison-table-body');
        if (!tableBody) return;
        tableBody.innerHTML = '';
        cargaisons.forEach(cargaison => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${cargaison.numero}</td>
                <td>${cargaison.typeCargaison}</td>
                <td>${cargaison.poidsMax} kg</td>
                <td>${cargaison.lieu_depart} → ${cargaison.lieu_arriver}</td>
                <td>${cargaison.distance} km</td>
                <td>${cargaison.etatAvancement}</td>
                <td>${cargaison.etatGlobal}</td>
                <td>${cargaison.prix.toLocaleString('fr-FR')} F</td>
            `;
            tableBody.appendChild(row);
        });
    } catch (error) {
        console.error('Erreur lors de la récupération des cargaisons:', error);
    }
}

document.addEventListener('DOMContentLoaded', afficherListeCargaisons);
