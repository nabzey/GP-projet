import { Personne } from "./Personne";

export class Client extends Personne {


    constructor(id: number, nom: string, prenom: string, email: string, adresse: string, telephone: string) {
        super(id, nom, prenom, email, adresse, telephone);
    }

    rechercherColis(){

    }

    // Enregistrer un colis
    public async enregistrerColis(colis: any, typeCargaison: string) {
        const response = await fetch("/db.json");
        const data = await response.json();
        // Générer un code unique pour le colis
        colis.code = "COLIS-" + Math.random().toString(36).substr(2, 9).toUpperCase();
        colis.typeCargaison = typeCargaison;
        // Ajout du colis à la cargaison correspondante
        const cargaison = data.cargaisons.find((c: any) => c.typeCargaison === typeCargaison && c.etatGlobal === "OUVERT");
        if (cargaison) {
            cargaison.colis.push(colis);
            await fetch("/db.json", {
                method: "PUT",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(data)
            });
            return colis.code;
        }
        return null;
    }

    // Générer un reçu pour le client
    public genererRecu(colis: any) {
        return `Reçu:\nExpéditeur: ${this.nom} ${this.prenom}\nTéléphone: ${this.telephone}\nAdresse: ${this.adresse}\nColis: ${colis.code}, Poids: ${colis.poids}, Type: ${colis.typeProduit}`;
    }

    // Suivi d'un colis par code
    public async suiviColis(code: string) {
        const response = await fetch("/db.json");
        const data = await response.json();
        for (const cargaison of data.cargaisons) {
            const colis = cargaison.colis.find((colis: any) => colis.code === code);
            if (colis) return colis.etat;
        }
        return "Code inexistant ou colis annulé";
    }

}