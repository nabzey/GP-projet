import { Personne } from "./Personne";

export class Gestionnaire extends Personne {
    private login: string;
    private password: string;

    constructor(id: number, nom: string, prenom: string, email: string, adresse: string, telephone: string, login: string, password: string) {
        super(id, nom, prenom, email, adresse, telephone);
        this.login = login;
        this.password = password;
    }

    public getLogin(): string {
        return this.login;
    }

    public getPassword(): string {
        return this.password;
    }

    // Rechercher une cargaison par code
    public async rechercherCargaisonParCode(code: string) {
        const response = await fetch("/db.json");
        const data = await response.json();
        return data.cargaisons.find((c: any) => c.numero === code);
    }

    // Rechercher une cargaison par lieu de départ
    public async rechercherCargaisonParLieuDepart(lieu: string) {
        const response = await fetch("/db.json");
        const data = await response.json();
        return data.cargaisons.filter((c: any) => c.lieu_depart === lieu);
    }

    // Rechercher une cargaison par lieu d'arrivée
    public async rechercherCargaisonParLieuArrivee(lieu: string) {
        const response = await fetch("/db.json");
        const data = await response.json();
        return data.cargaisons.filter((c: any) => c.lieu_arriver === lieu);
    }

    // Rechercher une cargaison par type
    public async rechercherCargaisonParType(type: string) {
        const response = await fetch("/db.json");
        const data = await response.json();
        return data.cargaisons.filter((c: any) => c.typeCargaison === type);
    }

    // Rechercher une cargaison par date de départ ou arrivée
    public async rechercherCargaisonParDate(date: string) {
        const response = await fetch("/db.json");
        const data = await response.json();
        return data.cargaisons.filter((c: any) => c.date_depart === date || c.date_arrivee === date);
    }

    // Rechercher un colis par code
    public async rechercherColisParCode(code: string) {
        const response = await fetch("/db.json");
        const data = await response.json();
        for (const cargaison of data.cargaisons) {
            const colis = cargaison.colis.find((colis: any) => colis.code === code);
            if (colis) return colis;
        }
        return null;
    }

    // Changer l'état d'un colis
    public async changerEtatColis(code: string, nouvelEtat: string) {
        const response = await fetch("/db.json");
        const data = await response.json();
        for (const cargaison of data.cargaisons) {
            const colis = cargaison.colis.find((colis: any) => colis.code === code);
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
    public async archiverColis(code: string) {
        await this.changerEtatColis(code, "archivé");
    }

    // Marquer un colis comme perdu
    public async marquerColisPerdu(code: string) {
        await this.changerEtatColis(code, "perdu");
    }

    // Récupérer un colis
    public async recupererColis(code: string) {
        await this.changerEtatColis(code, "récupéré");
    }
}
