import { EtatColis } from "./EtatColis";
import { Cargaison } from "./Cargaison";

export class Colis {
    protected id: number;
    protected poids: number;
    protected type_cargaison: string;
    protected cargaison: Cargaison | null;
    protected etat: EtatColis;
    protected code: string;
    protected prix: number;

    constructor(id: number, poids: number, type_cargaison: string, cargaison: Cargaison | null) {
        this.id = id;
        this.poids = poids;
        this.type_cargaison = type_cargaison;
        this.cargaison = cargaison;
        this.etat = EtatColis.EN_ATTENTE;
        this.code = this.generateCode();
        this.prix = 10000; // prix minimum par défaut
    }

    public getCargaison(): Cargaison | null {
        return this.cargaison;
    }
    public setCargaison(cargaison: Cargaison) {
        this.cargaison = cargaison;
    }
    public getEtat(): EtatColis {
        return this.etat;
    }
    public setEtat(etat: EtatColis) {
        this.etat = etat;
    }
    public getCode(): string {
        return this.code;
    }
    public getId(): number {
        return this.id;
    }
    public getPrix(): number {
        return this.prix;
    }
    public setPrix(prix: number) {
        this.prix = prix < 10000 ? 10000 : prix;
    }
    public getPoids(): number {
        return this.poids;
    }
    public getTypeCargaison(): string {
        return this.type_cargaison;
    }
    private generateCode(): string {
        return 'C' + Math.random().toString(36).substr(2, 9).toUpperCase();
    }
}
