var date = new Date();



// JOUR------------------------------------------------------------------------------------
var day = date.getDay();


switch (day) {
    case 1:
        day_fr = "lundi";
        break;

    case 2:
        day_fr = "mardi";
        break;

    case 3:
        day_fr = "mercredi";
        break;

    case 4:
        day_fr = "jeudi";
        break;

    case 5:
        day_fr = "vendredi";
        break;

    case 6:
        day_fr = "samedi";
        break;

    default:
        day_fr = "dimanche";
}

document.getElementById('day').innerHTML = day_fr;



// Numéro JOUR-----------------------------------------------------

var nbrDay = date.getDate();

document.getElementById('nbrDay').innerHTML = nbrDay;



// Numéro Mois-----------------------------------------------------

var mounth = date.getMonth();

switch (mounth) {
    case 0:
        mounth_fr = "janvier";
        break;

    case 1:
        mounth_fr = "févier";
        break;

    case 2:
        mounth_fr = "mars";
        break;

    case 3:
        mounth_fr = "avril";
        break;

    case 4:
        mounth_fr = "mai";
        break;

    case 5:
        mounth_fr = "juin";
        break;

    case 6:
        mounth_fr = "juillet";
        break;

    case 7:
        mounth_fr = "aout";
        break;

    case 8:
        mounth_fr = "septembre";
        break;

    case 9:
        mounth_fr = "octobre";
        break;

    case 10:
        mounth_fr = "novembre";
        break;

    default:
        mounth_fr = "décembre";

}
document.getElementById('mounth').innerHTML = mounth_fr;


//Année----------------------------------------------------

var year = date.getFullYear();

console.log(year);
document.getElementById('year').innerHTML = year;

//
////heure---------------------------------------------------
//
//var hour = date.getHours();  
//
////minutes---------------------------------------------------
//var minutes = date.getMinutes();  
//
////secondes---------------------------------------------------
//var seconds = date.getSeconds(); ;  
//
//


//heures---------------------------------------------------
function AffichageHeure() {

    var date = new Date();

    var hour2 = date.toLocaleTimeString();
    document.getElementById('divHeure').innerHTML = hour2;
}

setInterval("AffichageHeure()", 1000);


document.getElementById("soleil").onclick = function () {

    var audio = new Audio('Jour_nuit.mp3');
    audio.play();

}