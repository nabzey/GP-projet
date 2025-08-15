import { Colis } from "./Colis";
export class ProduitMateriel extends Colis {
    constructor(id, poids, type_cargaison, cargaison, typeMateriel) {
        super(id, poids, type_cargaison, cargaison);
        this.typeMateriel = typeMateriel;
    }
    getTypeMateriel() {
        return this.typeMateriel;
    }
}
