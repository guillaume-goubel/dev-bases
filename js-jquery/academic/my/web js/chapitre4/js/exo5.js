/* 
Activité 1
*/

// Liste des liens Web à afficher. Un lien est défini par :
// - son titre
// - son URL
// - son auteur (la personne qui l'a publié)
/*

// TODO : compléter ce fichier pour ajouter les liens à la page web
*/

/*
Exercice : construire un dictionnaire
*/

// Liste des mots du dictionnaire


var listeLiens = [
    {
        titre: "So Foot",
        url: "http://sofoot.com",
        auteur: "yann.usaille"
    },
    {
        titre: "Guide d'autodéfense numérique",
        url: "http://guide.boum.org",
        auteur: "paulochon"
    },
    {
        titre: "L'encyclopédie en ligne Wikipedia",
        url: "http://Wikipedia.org",
        auteur: "annie.zette"
    }
];





//var UL = document.createElement("ul"); // Création de la liste
//
//// Pour chaque mot, on construit une balise <dt> avec le terme et une balise <dd> avec sa définition
//listeLiens.forEach(function (lien) {
//
//    var ul = document.createElement("ul");
//
//
//    var dtElt = document.createElement("li");
//    var strongElt = document.createElement("li");
//    strongElt.textContent = lien.titre;
//
//
//    var ddElt = document.createElement("li");
//    ddElt.textContent = lien.url;
//
//
//    var ddEltdeux = document.createElement("li");
//    ddEltdeux.textContent = lien.auteur;
//
//
//
//    dtElt.appendChild(strongElt);
//    UL.appendChild(dtElt);
//    UL.appendChild(ddElt);
//    UL.appendChild(ddEltdeux);
//
//
//});
//
//document.getElementById("contenu").appendChild(UL); // Ajout de la liste à la page
