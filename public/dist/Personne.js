"use strict";
class Personne {
    constructor(id, nom, prenom, email, adresse, telephone = '') {
        this.id = id;
        this.nom = nom;
        this.prenom = prenom;
        this.email = email;
        this.adresse = adresse;
        this.telephone = telephone;
        this.dateCreation = new Date();
    }
    getId() {
        return this.id;
    }
    getNom() {
        return this.nom;
    }
    getPrenom() {
        return this.prenom;
    }
    getEmail() {
        return this.email;
    }
    getAdresse() {
        return this.adresse;
    }
    getTelephone() {
        return this.telephone;
    }
    getDateCreation() {
        return this.dateCreation;
    }
    getNomComplet() {
        return `${this.prenom} ${this.nom}`;
    }
}
