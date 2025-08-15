import { EtatColis } from "./EtatColis";
export class Colis {
    constructor(id, poids, type_cargaison, cargaison) {
        this.id = id;
        this.poids = poids;
        this.type_cargaison = type_cargaison;
        this.cargaison = cargaison;
        this.etat = EtatColis.EN_ATTENTE;
        this.code = this.generateCode();
        this.prix = 10000; // prix minimum par défaut
    }
    getCargaison() {
        return this.cargaison;
    }
    setCargaison(cargaison) {
        this.cargaison = cargaison;
    }
    getEtat() {
        return this.etat;
    }
    setEtat(etat) {
        this.etat = etat;
    }
    getCode() {
        return this.code;
    }
    getId() {
        return this.id;
    }
    getPrix() {
        return this.prix;
    }
    setPrix(prix) {
        this.prix = prix < 10000 ? 10000 : prix;
    }
    getPoids() {
        return this.poids;
    }
    getTypeCargaison() {
        return this.type_cargaison;
    }
    generateCode() {
        return 'C' + Math.random().toString(36).substr(2, 9).toUpperCase();
    }
}
