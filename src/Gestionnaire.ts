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
}
