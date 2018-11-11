console.log("debut fin");


var Personnage = {
    initPerso: function (nom, force, sante) {
        Personnage.nom = nom;
        Personnage.force = force;
        Personnage.nom = sante;
    },

};


var Joueur = Object.create(Personnage);
Joueur.initJoueur = function (nom, force, sante) {
    this.initPerso(nom, force, sante);
    this.xp = 0;
};


Joueur.decrire = function () {
    var description = this.nom + " a " + this.sante + " points de vie, " +
        this.force + " en force et " + this.xp + " points d'expérience";
    return description;
};


var Adversaire = Object.create(Personnage);
Adversaire.initAdversaire = function (nom, force, sante, race, valeur) {
    this.initPerso(nom, force, sante);
    this.race = race;
    this.valeur = valeur;
};


var joueur1 = Object.create(Joueur);
joueur1.initJoueur("Aurora", 150, 25);

var monstre1 = Object.create(Adversaire);
monstre1.initAdversaire("ZogZog", 40, 20, "orc", 10);
