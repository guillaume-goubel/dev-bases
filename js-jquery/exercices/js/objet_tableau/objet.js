//var array =["banane"];
//console.log(array);

//var obj = new Object();
var obj = {};

//console.log(obj);

var obj_ford = {
    model: "Mustang", //  clé "model" dans l'objet
    moto: "Essence"
};

//ajout d'une couleur : 
obj_ford.color ="red";


var arr_ford = [
    "Mustang", //model    //  index dans un objet
    "Essence" //moteur
];


// popir afficher c'st plsu simple sous Objet →
//console.log(obj_ford.model); //.model
//console.log(arr_ford[0]); // [0];

//
var arr_vehicule = [
    
    
    {
        model: "Mustang",
        moto: "Essence",
        color: ["red", "blue"]
    },



    {
        model: "Twingo",
        moto: "Essence"
    }
]


$.each(arr_vehicule, function (key, value) { 
    
    console.log(value.model + value.moto );

    $.each(value.color, function (indexInArray, value2) { 
        console.log(value2);
    });


});





var users = [
    
    {
        name: "Bruce",
        age: 30,
        hero_name: "batman",
        power: []
    },

    {
        name: "Clark",
        age: 29,
        power: [
            "x-ray",
            "ice breath"
        ]
    },

    {
        name: "Franck",
        age: 27,
        power: []
    }
];




//for (i in users) //boucle for in , index de chaque ligne à chaque itération
//{
//console.log(users[i]);
//}


/* 

//La boucle ForOF extrait à chaque itération les donnés du tableau "users" et les stock dans la variable "user"
for (user of users) { // retourne la data de chaque ligne du tableau à chaque itération data de chaque user

//La boucle ForIn exterait à chaque itération , les index de chaque ligne du tableau
    for (key in user)

        if (key == "name" || key == "age") {//choix des clés name et age
            {
/*                 console.log(key + " : " + user[key]);
            }
        }

console.log(users[1].name + " " + users[1].power[0])
console.table(users); 
}*/



