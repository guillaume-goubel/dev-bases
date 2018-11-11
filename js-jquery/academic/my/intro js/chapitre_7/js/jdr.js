var Personnage = {
    // Initialise le personnage
    initPerso: function (nom, sante, force, pieces, cles) {
        this.nom = nom;
        this.sante = sante;
        this.force = force;
        this.pieces = 10;
        this.cles = 1;
    },

    // Attaque un personnage cible
    attaquer: function (cible) {
        if (this.sante > 0) {
            var degats = this.force;
            console.log(this.nom + " attaque " + cible.nom + " et lui fait " + degats + " points de dégâts");
            cible.sante = cible.sante - degats;
            if (cible.sante > 0) {
                console.log(cible.nom + " a encore " + cible.sante + " points de vie");
            } else {
                cible.sante = 0;
                console.log(cible.nom + " est mort !");
            }
        } else {
            console.log(this.nom + " ne peut pas attaquer : il est mort...");
        }
    },
};

var Joueur = Object.create(Personnage);
// Initialise le joueur
Joueur.initJoueur = function (nom, sante, force, pieces, cles) {
    this.initPerso(nom, sante, force, pieces, cles);
    this.xp = 0;
};


// Renvoie la description du joueur
Joueur.decrire = function () {
    var description = this.nom + " a " + this.sante + " points de vie, " +
        this.force + " en force et " + this.xp + " points d'expérience. Il possède " + this.pieces + " pieces et " + this.cles + " cles ";
    return description;
};


// Combat un adversaire
Joueur.combattre = function (adversaire, pieces, cles) {
    this.attaquer(adversaire);
    if (adversaire.sante === 0) {
        console.log(this.nom + " a tué " + adversaire.nom + " et gagne " +
            adversaire.valeur + " points d'expérience");
        this.xp += adversaire.valeur;
        this.pieces += adversaire.pieces;
        this.cles += adversaire.cles;
    }
};

var Adversaire = Object.create(Personnage);
// Initialise l'adversaire
Adversaire.initAdversaire = function (nom, sante, force, race, valeur) {
    this.initPerso(nom, sante, force);
    this.race = race;
    this.valeur = valeur;
};


// ...

var joueur1 = Object.create(Joueur);
joueur1.initJoueur("Aurora", 150, 25);


var joueur2 = Object.create(Joueur);
joueur2.initJoueur("Glacius", 130, 30);


console.log("Bienvenue dans ce jeu d'aventure ! Voici nos courageux héros :");
console.log(joueur1.decrire());
console.log(joueur2.decrire());

var monstre = Object.create(Adversaire);
monstre.initAdversaire("ZogZog", 40, 20, "orc", 10);

console.log("Un affreux monstre arrive : c'est un " + monstre.race + " nommé " + monstre.nom);

monstre.attaquer(joueur1);
monstre.attaquer(joueur2);

joueur1.combattre(monstre);
joueur2.combattre(monstre);

console.log(joueur1.decrire());
console.log(joueur2.decrire());
