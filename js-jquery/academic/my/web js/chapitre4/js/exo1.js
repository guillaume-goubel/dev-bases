var textColor = prompt("couleur texte ?");
var textFonds = prompt("couleur fonds ?");

var titresElts = document.getElementsByClassName("titre"); // Tous les titres h2

for (i = 0; i < titresElts.length; i++) {
    titresElts[i].style.color = textColor;
    titresElts[i].style.backgroundColor = textFonds;
}


//console.log(titresElts.length);
