import { Personne } from "./Personne";

export class Client extends Personne {


    constructor(id: number, nom: string, prenom: string, email: string, adresse: string, telephone: string) {
        super(id, nom, prenom, email, adresse, telephone);
    }

    rechercherColis(){

    }

    

}