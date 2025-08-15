import { EtatGlobal } from "./EtatGlobal";
import { TypeCargaison } from "./TypeCargaison";
import { Colis } from "./Colis";

export class Cargaison {
    private id: number;
    private numero: string;
    private poidsMax: number;
    private prix: number;
    private typeCargaison: TypeCargaison;
    private etatGlobal: EtatGlobal;
    private lieu_depart: string;
    private lieu_arriver: string;
    private distance: number;
    private etatAvancement: string;
    private date_depart: Date;
    private date_arrivee: Date;
    private colis: Colis[] = [];

    constructor(id: number, numero: string, poidsMax: number, typeCargaison: TypeCargaison, lieu_depart: string, lieu_arriver: string, distance: number, date_depart: Date, date_arrivee: Date) {
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

    public addColis(colis: Colis) {
        if (this.etatGlobal === EtatGlobal.OUVERT) {
            this.colis.push(colis);
            this.updatePrix();
        }
    }
    public getColis(): Colis[] {
        return this.colis;
    }
    public fermer() {
        this.etatGlobal = EtatGlobal.FERMER;
    }
    // Méthode pour vérifier l'état d'avancement
    public getEtatAvancement(): string {
        return this.etatAvancement;
    }

    // Méthode pour changer l'état d'avancement
    public setEtatAvancement(etat: string) {
        this.etatAvancement = etat;
    }

    // Méthode pour rouvrir la cargaison si en attente
    public ouvrir() {
        if (this.etatAvancement === "en_attente") {
            this.etatGlobal = EtatGlobal.OUVERT;
        }
    }

    // Méthode statique pour lister les cargaisons depuis db.json
    static async listerCargaisons(): Promise<Cargaison[]> {
        const response = await fetch("/db.json");
        const data = await response.json();
        return data.cargaisons.map((c: any) => new Cargaison(
            c.id, c.numero, c.poidsMax, c.typeCargaison, c.lieu_depart, c.lieu_arriver, c.distance, new Date(c.date_depart), new Date(c.date_arrivee)
        ));
    }

    // Méthode statique pour créer une nouvelle cargaison
    static async creerCargaison(cargaison: Cargaison): Promise<void> {
        const response = await fetch("/db.json");
        const data = await response.json();
        data.cargaisons.push(cargaison);
        await fetch("/db.json", {
            method: "PUT",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(data)
        });
    }

    private updatePrix() {
        this.prix = this.colis.reduce((total, c) => total + c.getPrix(), 0);
    }
    public getPrix(): number {
        return this.prix;
    }
    // Autres getters/setters selon besoin
}
