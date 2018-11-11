// BOUCLE FOR

for (var i = 0; i < 10; i++) {
    console.log("i vaut : " + i);
}

// ou "let i" pour une variable qui ne servira QUE dans le boucle. 


//déclaration de tableau

var fruits = [
    /*0 pour l'index*/
    "pommes",
    /*1*/
    "poires",
    /*2*/
    "bananes",
    /*3*/
    "kiwi",
    /*4*/
    "fraises"
];

// un tableau associatif est un objet

// Parcourir un tableau via les index

//1. 

//console.log(fruits[0]);
//console.log(fruits[1]);
//console.log(fruits[2]);
//console.log(fruits[3]);
//console.log(fruits[4]);

for (let i = 0; i < fruits.length; i++) {
    console.log(fruits[i]);
}

console.table(fruits); // pour afficher un tableau


// BOUCLE WHILE
i = 1;

while (i <= 10) {
    console.log("i vaut :" + i);
    i++;
}
console.log("ma boucle est finie");


// DO WHILE
i = 0;

do {
    console.log("i vaut :" + i++);
} while (i < 10);

console.log("ma boucle est finie");
