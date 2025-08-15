import { Colis } from "./Colis";
export class ProduitChimique extends Colis {
    constructor(id, poids, type_cargaison, cargaison, degreToxicite) {
        super(id, poids, type_cargaison, cargaison);
        this.degreToxicite = degreToxicite;
    }
    getDegreToxicite() {
        return this.degreToxicite;
    }
}
