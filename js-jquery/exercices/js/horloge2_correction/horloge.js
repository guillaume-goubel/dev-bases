// mise des jours dans un tableau pour les appeler par la suite
var jours = ["Dim.", "Lun.", "Mar.", "Mer.", "Jeu", "Ven.", "Sam."];
var mois = ["jan.", "fév.", "mar.", "avr.", "mai", "juin", "juil.", "aout", "sep.", "oct.", "nov.", "déc."];



function clock() {
    var date = new Date();

    var jour = date.getDay();
    var jourNom = jours[jour];
    
    var jourNum = date.getDate();


    var moisNum = date.getMonth();
    var moisNom = mois[moisNum];

    var annee = date.getFullYear();

    var heures = date.getHours();

    var minutes = date.getMinutes();
    minutes = minutes < 10 ? "0" + minutes : minutes;

    var secondes = date.getSeconds();
    secondes = secondes < 10 ? "0" + secondes : secondes;

    document.getElementById("jourNom").innerHTML = jourNom;
    document.getElementById("jour").innerHTML = jourNum;
    document.getElementById("mois").innerHTML = moisNom;



    document.getElementById("annee").innerHTML = annee;
    document.getElementById("heures").innerHTML = heures;
    document.getElementById("minutes").innerHTML = minutes;
    document.getElementById("secondes").innerHTML = secondes;

    separator(true);
    setTimeout(separator, 500);// ici c'est la fonction separator qui est appelée !!

}
// identifier les séprateurs avec leur référence dans le DOM : il y a deux calsses separators. il faut donc l'identifer [0] et [1]


var separators = document.getElementsByClassName("separator"); // on fait une variables avec les elements qui ont la "calsse separator"

for (index in separators) //pour chaque element separators , je recupère les index de separators

{
    separators[index].innerHTML = ":";
}


function separator(show) {
    document.getElementsByClassName("separator")[0].innerHTML = show ? ":" : "";
    document.getElementsByClassName("separator")[1].innerHTML = show ? ":" : "";
}

clock();
setInterval(clock, 1000); // ici c'est la fonction clock qui est appelée !!