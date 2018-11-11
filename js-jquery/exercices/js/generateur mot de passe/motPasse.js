// JE PASSE EN PARAMETRE les variables
function randomStrings(passSize, uppercase, numeric, special) { // JS s'attend à avoir 4 arguments 


    var defaultSize = 10;
    passSize = Number(passSize) || defaultSize; // on définit la valeur de PassSize à la valur qu'il aura ou on le force à prendre 10; // on précise avec 

    //if (typeof (passSize) != "number") { 
    //    passSize = defaultSize;
    //}


    //controle de la taille 1
    if (passSize > 10 || passSize < 1) {
        passSize = defaultSize;
    }

    //controle de la taille 2
    //if (passSize < defaultSiz  || passSize > 40 ) { 
    //    passSize = defaultSize;
    //}


    // si le type de uppercase (argument) est un boolean
    // uppercase la (variable) vaut uppercase l'argument
    // sinon uppercase (variable) vaut false 


    // Avec un if , vérification de typeof uppercase
    if (typeof (uppercase) === "boolean") {
        uppercase = uppercase;
    } else {
        uppercase = false;
    }

    // Avec un type ternaire vérification de typeof uppercase
    //uppercase = (typeof (uppercase) == "boolean") ? uppercase : false;
    numeric = (typeof (numeric) == "boolean") ? numeric : false;
    special = (typeof (special) == "boolean") ? special : false;

    //var PassSize = 10; // Vers la fin du développement
    //var uppercase = true;
    //var numeric = true;
    //var special = true;


    var output = '' // output sera le retour de la fonction de génération du mot de passe. Sert à stocker la chaine que l'on va générer.

    //1 chaine de base
    var chars = "abcdefghijklmnopqrstuvwxyz";

    //2 Ajout des caracteres en majuscule
    if (uppercase === true) { // chars += ABCD...
        chars += chars.toUpperCase();
    }

    //3 Ajout des caractères numériques
    if (numeric === true) {
        chars += "0123456789";
    }

    //4 Ajout des caractères spéciaux
    if (special === true) {
        chars += "&é\"'(-è_çà)";
    }







    // Aléatoire entre 0 et 1
    //console.log(Math.random());

    //Aléatoire entre 1 et 10
    //console.log(  (Math.random() * 10 ) + 1 );

    //Aléatoire entre 1 et n longuer de la chaine
    //console.log(  (Math.random() * n ) + 1 );

    // Arrondir au chiffre supérieur
    // caractères de la chaine Chars
    //var intRand = Math.floor(Math.random() * n) + 1; // on rajoute 1 pour éviter zéro

    //console.log(intRand);

    //récupérer le caractère de la chaine Chars , à une position précise via le choix 2 de la fonction charAt (ici 2)
    //console.log(chars.charAt(2));

    //récupérer le caractère de la chaine Chars , à une position précise via le choix 2 de la fonction charAt Mais aléatoire (intRand)
    //console.log(chars.charAt(intRand));


    // On a pour le moment su faire uen sélection de 1 caractère aléatoire , il faut maintenant construire une chaine de 10 caractères max avec une boucle for;

    // récupérer de X caractères aléatoires
    //for (i = 0 ; i < PassSize; i++){
    //    console.log (chars.charAt(       Math.floor   (Math.random() * n ) ));
    //}

    //--> Nombre de caractères de chars
    var n = chars.length;

    for (i = 0; i < passSize; i++) {
        output += chars.charAt(Math.floor(Math.random() * n));
    }

    return output;
}

//console.log(randomStrings());



//document.getElementById("PassSize").onclick = function () { //fonction anonyme
//alert("hello1");



//On détecte le bouton dans le bouton "générer"
// On détermine les variables 

document.getElementById("GenerateBtn").onclick = function () { //fonction anonyme

    var passSize = document.getElementById("passSize").value; //parametrers chosis par utilisateur
    var uppercase = document.getElementById("uppercase").checked;//parametrers chosis par utilisateur !!!!!!uppercase = true or false
    var numeric = document.getElementById("numeric").checked;//parametrers chosis par utilisateur
    var special = document.getElementById("special").checked;//parametrers chosis par utilisateur

    //alert(randomStrings(passSize, uppercase, numeric, special));

    var password = randomStrings(passSize, uppercase, numeric, special); // on remplace le résulat par une variable

    document.getElementById("password").innerHTML = password;

}



//console.log(document.getElementById("PassSize").value); //récupérer la valeur d'une chaine de caractères
//console.log(document.getElementById("uppercase").checked);
//console.log(document.getElementById("numeric").checked);
//console.log(document.getElementById("special").checked);








//var a = "azerty"
//console.log(a);

//console.log(typeof (randomStrings()));
//typeof la fonction va permettre de voir le type de données