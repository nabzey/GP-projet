import { Colis } from "./Colis";
import { TypeMatiere } from "./TypeMatiere";
import { Cargaison } from "./Cargaison";

export class ProduitMateriel extends Colis {
    private typeMateriel: TypeMatiere;

    constructor(id: number, poids: number, type_cargaison: string, cargaison: Cargaison | null, typeMateriel: TypeMatiere) {
        super(id, poids, type_cargaison, cargaison);
        this.typeMateriel = typeMateriel;
    }

    public getTypeMateriel(): TypeMatiere {
        return this.typeMateriel;
    }
}
