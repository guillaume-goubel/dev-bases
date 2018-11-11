// TODO : ajoutez ici la définition des objets nécessaires
var Compte = {
    initCompte: function (nom, solde) {
        this.nom = nom;
        this.solde = solde;
    },

    decrire: function () {
        return " Le compte au nom de " + this.nom + " a un solde de " + this.solde + " euros. "
    },

    crediter: function (montant) {
        this.solde = this.solde + montant;
    },

    debiter: function (montant) {
        this.solde = this.solde - montant;
    },

};

var CompteBancaire = Object.create(Compte);
CompteBancaire.initCB = function (nom, solde) {
    this.initCompte(nom, solde);
};


var CompteEpargne = Object.create(Compte);
CompteEpargne.initCE = function (nom, solde, taux) {
    this.initCompte(nom, solde);
    this.taux = taux;
};

CompteEpargne.ajouterInterets = function (solde, taux) {
    this.solde = this.solde + this.solde * this.taux;
};

var compte1 = Object.create(CompteBancaire);
compte1.initCB("Alex", 100);

var compte2 = Object.create(CompteEpargne);
compte2.initCE("Marco", 50, 0.05);


console.log("Voici l'état initial des comptes :");
console.log(compte1.decrire());
console.log(compte2.decrire());


var montant = Number(prompt("Entrez le montant à transférer entre les comptes :"));
compte1.debiter(montant);
compte2.crediter(montant);



// Calcule et ajoute les intérêts au solde du compte
compte2.ajouterInterets();




console.log("Voici l'état final des comptes après transfert et calcul des intérêts :");
console.log(compte1.decrire());
console.log(compte2.decrire());
