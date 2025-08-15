import { Personne } from "./Personne";
export class Gestionnaire extends Personne {
    constructor(id, nom, prenom, email, adresse, telephone, login, password) {
        super(id, nom, prenom, email, adresse, telephone);
        this.login = login;
        this.password = password;
    }
    getLogin() {
        return this.login;
    }
    getPassword() {
        return this.password;
    }
    // Rechercher une cargaison par code
    async rechercherCargaisonParCode(code) {
        const response = await fetch("/db.json");
        const data = await response.json();
        return data.cargaisons.find((c) => c.numero === code);
    }
    // Rechercher une cargaison par lieu de départ
    async rechercherCargaisonParLieuDepart(lieu) {
        const response = await fetch("/db.json");
        const data = await response.json();
        return data.cargaisons.filter((c) => c.lieu_depart === lieu);
    }
    // Rechercher une cargaison par lieu d'arrivée
    async rechercherCargaisonParLieuArrivee(lieu) {
        const response = await fetch("/db.json");
        const data = await response.json();
        return data.cargaisons.filter((c) => c.lieu_arriver === lieu);
    }
    // Rechercher une cargaison par type
    async rechercherCargaisonParType(type) {
        const response = await fetch("/db.json");
        const data = await response.json();
        return data.cargaisons.filter((c) => c.typeCargaison === type);
    }
    // Rechercher une cargaison par date de départ ou arrivée
    async rechercherCargaisonParDate(date) {
        const response = await fetch("/db.json");
        const data = await response.json();
        return data.cargaisons.filter((c) => c.date_depart === date || c.date_arrivee === date);
    }
    // Rechercher un colis par code
    async rechercherColisParCode(code) {
        const response = await fetch("/db.json");
        const data = await response.json();
        for (const cargaison of data.cargaisons) {
            const colis = cargaison.colis.find((colis) => colis.code === code);
            if (colis)
                return colis;
        }
        return null;
    }
    // Changer l'état d'un colis
    async changerEtatColis(code, nouvelEtat) {
        const response = await fetch("/db.json");
        const data = await response.json();
        for (const cargaison of data.cargaisons) {
            const colis = cargaison.colis.find((colis) => colis.code === code);
            if (colis) {
                colis.etat = nouvelEtat;
                break;
            }
        }
        await fetch("/db.json", {
            method: "PUT",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(data)
        });
    }
    // Archiver un colis
    async archiverColis(code) {
        await this.changerEtatColis(code, "archivé");
    }
    // Marquer un colis comme perdu
    async marquerColisPerdu(code) {
        await this.changerEtatColis(code, "perdu");
    }
    // Récupérer un colis
    async recupererColis(code) {
        await this.changerEtatColis(code, "récupéré");
    }
}
