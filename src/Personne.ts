abstract class Personne {
    protected id: number;
    protected nom: string;
    protected prenom: string;
    protected email: string;
    protected adresse: string;
    protected telephone: string;
    protected dateCreation: Date;

    constructor(
        id: number,
        nom: string,
        prenom: string,
        email: string,
        adresse: string,
        telephone: string = ''
    ) {
        this.id = id;
        this.nom = nom;
        this.prenom = prenom;
        this.email = email;
        this.adresse = adresse;
        this.telephone = telephone;
        this.dateCreation = new Date();
    }

    public getId(): number {
        return this.id;
    }

    public getNom(): string {
        return this.nom;
    }

    public getPrenom(): string {
        return this.prenom;
    }

    public getEmail(): string {
        return this.email;
    }

    public getAdresse(): string {
        return this.adresse;
    }

    public getTelephone(): string {
        return this.telephone;
    }

    public getDateCreation(): Date {
        return this.dateCreation;
    }

    public getNomComplet(): string {
        return `${this.prenom} ${this.nom}`;
    }
}
