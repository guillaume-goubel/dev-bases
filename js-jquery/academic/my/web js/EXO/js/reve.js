var AA = function () {

    var aElts = document.getElementsByTagName("a");
    console.log(aElts.length);

    console.log(aElts[0].getAttribute("href"));
    console.log(aElts[aElts.length - 1].getAttribute("href"));
}

AA();

var possede = function (id, classe) {

    if (document.getElementById(id).classList.contains(classe)) {
        console.log("True");
    } else if (!document.getElementById(id).classList.contains(classe))
        console.log("False");
    else {
        console.log("Erreur");
    }

}

possede("saxophone", "bois"); // Doit afficher true
possede("saxophone", "cuivre"); // Doit afficher false
possede("trompette", "cuivre"); // Doit afficher true
possede("contrebasse", "cordes"); // Doit afficher une erreur
