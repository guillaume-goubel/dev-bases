// Liste des journaux
var journaux = ["http://lemonde.fr", "http://lefigaro.fr", "http://liberation.fr"];

// TODO : ajouter la liste des journaux sur la page, dans la div "contenu"

// Ajout d'un élément au tout début de la liste
document.getElementById('contenu').insertAdjacentHTML("afterend",
    '<li id="javascript">JavaScript</li>');
