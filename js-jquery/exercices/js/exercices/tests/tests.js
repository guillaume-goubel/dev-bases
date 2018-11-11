//placard = {
//
//    cereales: {
//        corn_flakes: 1,
//        frosties: 2
//    },
//    
//    barres: {
//        snickers: 5,
//        mars: 6
//    },
//    pates: {
//        tagliatelle: 2,
//        spaghetti: 5
//    }
//};
//
//
//    console.log(placard.cereales.rice_krispies);


/* var listeLiens = [];

function afficher() {

    while (true) {

        titreUser = prompt("titre");
        urlUser = prompt("url");
        auteurUSer = prompt("auteur");

        if (titreUser && urlUser && auteurUSer != "") {

            listeLiens.push({
                titre: titreUser,
                url: urlUser,
                auteur: auteurUSer
            });
        } else {
            break;
        }
    }

    for (i = 0; i < listeLiens.length; i++) {

        console.log(listeLiens[i].titre + " , " + listeLiens[i].url + " , " + listeLiens[i].auteur);
    }

}

afficher(); */


/* do {
    var film = prompt("rentrer un film");
} while (isNaN(film))


 */

//OBJET

function Users(nom,prenom){
    this.nom = nom;
    this.prenom = prenom;
}

var user1 = new Users("goubel", "guillaume");
var user2 = new Users("dupont", "charles");

user1_tab = Object.values(user1);
user2_tab = Object.values(user2);

function Voiture(fab,proprietaire){
    this.fab = fab;
    this.proprietaire = proprietaire;

    
    this.message = function(){
        var utilisateur = this.proprietaire.prenom + "possede une " + this.fab;
        return utilisateur;
        };
}

var voiture1 = new Voiture("peugeot", user1);

//console.log(voiture1.fab + " " + voiture1.proprietaire.nom);

var test = Object.getOwnPropertyNames(user1);
console.log(test);


var test2 = Object.entries(user1)[0] + Object.entries(voiture1)[0] ;
console.log(test2);

/* 
var mousquetaires = ["Athos", "Porthos", "Aramis"];

console.log("Voici les trois mousquetaires :");
for (var i = 0; i < mousquetaires.length; i++) {
    console.log(mousquetaires[i]);
}

mousquetaires.push("D'Artagnan");

console.log("A présent, ils sont quatre !");
mousquetaires.forEach(function (mousquetaire) {
    console.log(mousquetaire);
});
 */

