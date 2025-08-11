import { Colis } from "./Colis";
import { Cargaison } from "./Cargaison";

export class ProduitChimique extends Colis {
    private degreToxicite: number;

    constructor(id: number, poids: number, type_cargaison: string, cargaison: Cargaison | null, degreToxicite: number) {
        super(id, poids, type_cargaison, cargaison);
        this.degreToxicite = degreToxicite;
    }

    public getDegreToxicite(): number {
        return this.degreToxicite;
    }
}
