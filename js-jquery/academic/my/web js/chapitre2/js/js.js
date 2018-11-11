// Tous les éléments ayant la classe "merveilles"
var merveillesElts = document.getElementsByClassName("merveilles");
for (var i = 0; i < merveillesElts.length; i++) {
    console.log(merveillesElts[i]);
}


// Le premier paragraphe
console.log(document.querySelector("p"));


// Le contenu HTML de l'élément identifié par "contenu"
console.log(document.getElementById("contenu").innerHTML);


// L'identifiant de la première liste
console.log(document.querySelector("ul").id);

// L'attribut href du premier lien
console.log(document.querySelector("a").href);
