function randomStrings(PassSize, uppercase, numeric, special) {

    var outPut = ""

    var PassSizeDefault = 10;

    PassSize = PassSize || PassSizeDefault;
    uppercase = (typeof(uppercase) ==="boolean") ? uppercase : false; 



    //var uppercase = true;
    //var numeric = true;
    //var special = true;


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

    var n = chars.length;


    // Aléatoire entre 0 et 1
    console.log(Math.random());

    console.log((Math.random() * 10) + 1);

    var intRand = Math.floor(Math.random() * n) + 1; // on rajoute 1 pour éviter zéro

    console.log(chars.charAt(intRand));



    for (i = 0; i < PassSize; i++) {
        console.log(chars.charAt(Math.floor(Math.random() * n) + 1));
    }


    for (i = 0; i < PassSize; i++) {
        outPut += chars.charAt(Math.floor(Math.random() * n) + 1)
    }

    console.log(outPut);

}