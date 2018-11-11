/* 
Activité 1
*/

// Liste des liens Web à afficher. Un lien est défini par :
// - son titre
// - son URL
// - son auteur (la personne qui l'a publié)
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

// TODO : compléter ce fichier pour ajouter les liens à la page web

var ListeTotale = document.createElement("span");
ListeTotale.id = "ListeTotaleId"; // Définition de son identifiant
document.getElementById("contenu").appendChild(ListeTotale);

var soFoot1 = document.createElement("ul");

var titresoFoot1 = document.createElement("strong");
titresoFoot1 = listeLiens[0].titre;
var pElt = document.querySelector("strong");
titresoFoot1.style.color = "red";


document.getElementById("ListeTotaleId").appendChild(soFoot1);
