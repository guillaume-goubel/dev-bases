// IF 

if (true) {
    console.log("code executé");
}


// -- IF ... ELSE

// On défini l'état d"ouverture du magasin dans une variable
var isOpen = true;

//if isOpen == true équivaut à
if (isOpen) {
    console.log("le mgasin est ouvert");
} else {
    console.log("le mgasin est fermé");
}


// -- IF ... ELSE IF ... ELSE

var note = 8;

if (note === 10) {
    console.log("Bravo");
} else if (note > 5) {
    console.log("Moyen");
} else {
    console.log("Bof");
}


// -- OPERATEUR TERNAIRE

// equivalent IF ... ELSE

var isOpen = true;
var result = '';

if (isOpen) {
    result = "le mgasin est ouvert";
} else {
    result = "le mgasin est fermé";
}
console.log(result);



// Avec ternaire , on teste la condition sur la meme ligne
var isOpen = false;
var result = isOpen /*=== true*/ ? "le mgasin est Ouvert":"le mgasin est fermé";
console.log(result);


// -- COMMUNTATEUR SWITCH

var color = "green";

switch (color)
{
    case 'red':
    console.log("STOP");
    break;

    case 'orange':
    console.log("PLEASE STOP");
    break;

    case 'green':
    console.log("GO");
    default:

    console.log("Go away !!")
    // break;
}


//

var _continuer = confirm("encore?");
console.log(_continuer);












