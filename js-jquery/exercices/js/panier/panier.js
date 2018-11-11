function listCourses(legumes, fruits) {

    var legumes = document.getElementById("exampleFormControlSelect1-1").value;
    var fruits = document.getElementById("exampleFormControlSelect1-2").value;

    iLegumes = Number(legumes);
    iFruits = Number(fruits);


    if (iLegumes <= 1 && iFruits <= 1) {
        var output = "Votre liste de course est composée de " + legumes + " légume et " + fruits + " fruit.";
    } else if (iLegumes > 1 && iFruits <= 1) {
        var output = "Votre liste de course est composée de " + legumes + " légumes et " + fruits + " fruit.";
    } else if (iLegumes <= 1 && iFruits > 1) {
        var output = "Votre liste de course est composée de " + legumes + " légume et " + fruits + " fruits.";
    } else {
        var output = "Votre liste de course est composée de " + legumes + " légumes et " + fruits + " fruits.";
    }

    return output;
}







document.getElementById("GenerateBtn").onclick = function () {

    var legumes = document.getElementById("exampleFormControlSelect1-1").value;
    var fruits = document.getElementById("exampleFormControlSelect1-2").value;

    var m = "Vous n'avez pas choisi de produits !!";

    if (legumes === "0" && fruits === "0") {
        alert(m);
    } else {
        document.getElementById("vos-courses").innerHTML = listCourses();

        var monImg = document.createElement('img');
        monImg.src = "panier-legumes.jpg";

        $('#toto').empty();
        document.getElementById("toto").appendChild(monImg);

        var panier = [];
        panier.push(legumes + fruits );

        console.log(panier);

    }

}