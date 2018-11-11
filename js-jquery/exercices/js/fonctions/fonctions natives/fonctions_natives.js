console.log("début");


/*

// FONCTIONS NATIVES

// liste des fonctions natives.
console.log(window);

//fonction alerte
alert("vous avez gagné !!");

// Pour appeler une fonction , son nom + les paramètres.


// FONCTIONS UTILISATEURS
function maFonction1() {
    //console.log("ma fonction est appelée");
    //return "hello";
    var a = 10;
    var b = 20;
    return a + b;
}

// appel de la fonction
console.log(maFonction1());


// FONCTIONS UTILISATEURS AVEC PARAMETRES
function maFonction2(c, d) {
    return c + d;
}

// appel de la fonction
console.log(maFonction2(30, 20));


*/

//stokage de la fonction jusqu'à la déclartion de la fonction
function a() {
    return 42;
}


function b() {
    console.log("azerty");
}

console.log(a());
console.log(b()); //ici resssorira azerty mais aussi undifined

console.log("fin");