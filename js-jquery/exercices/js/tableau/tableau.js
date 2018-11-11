// LES TABLEAUX JS

//1 
//Déclarer un tableau
//Le tableau a deux entrées
var arr_fruits = [
    "banane",
    "pomme"
];

//2 On va afficher la pomme
console.log(arr_fruits[1]);

//3 On veut toutes les entrées : A la suite
console.log(arr_fruits[0]);
console.log(arr_fruits[1]);


//3 On veut toutes les entrées : Boucle
for (i = 0; i < arr_fruits.length; i++) {
    console.log(arr_fruits[i]);
}

//Afviher tout le tableau
//console.log(arr_fruits);

//on ajoute une entrée
arr_fruits.push("kiwi");
arr_fruits.push("fraises");
arr_fruits.push("ananas");


//console.log(arr_fruits);


//connaitre la position de kiwi dans le tableau
var pos_kiwi = arr_fruits.indexOf("kiwi"); // AVec indexOf ici kiwi est 2
//console.table(pos_kiwi);

//Supprime kiwi d'un tableau
arr_fruits.splice(pos_kiwi, 1); // premier parametre : la position de kiwi dasn le tableau, ici [2] // second parametre : la longeur de l'entree enlevée (ici 1)
//console.table(arr_fruits);

// cration d'un varible "string fruits" qui est egale au tableau "joint" avec la glue (" → ") 
var str_fruits = arr_fruits.join(" → ");

// création d'une varible "body" qui est egale au tableau "joint" avec la glue (" → ") 
var body = document.getElementsByTagName("body")[0]; // rechercher dans le body
body.innerText = str_fruits; // utilisation de join + signe flche alt+26

console.log(body);




//for (i=0; i<arr_fruits.length; i++){
//    body.innerText += arr_fruits[i];
//}



//convertir une chaine de caractere en tableau
var arr_fruits2 = str_fruits.split (" → "); // revient sous la forme d'un tableau
console.log(arr_fruits2);

