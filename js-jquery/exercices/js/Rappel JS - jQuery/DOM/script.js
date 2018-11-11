"use strict"

var parent_js = document.getElementsByClassName('parent_js')[0];
console.log(parent_js);


var parent_jquery = $('.parent_jquery');
console.log(parent_jquery);


//element JS
var child_js = document.createElement('DIV');
child_js.setAttribute('class', 'blue');
parent_js.appendChild(child_js);

//element JQUERY
var child_jq = $('<div></div>');
parent_jquery.append(child_jq);

child_jq.attr({
    "class": "green"
}, );



//====================
//BOUCLES
//====================


var users = { //Tableau des utilisateurs

    "client": [{
        "Numéro client": "client_Number",
        "Type": "particulier",
        "Adresse": "58 rue de Balfour , 59510 HEM",
        "Email": "client@labp.com",
        "sex": "sexUser",
        "fName": "fNameUser",
        "sold": [{
            "amount": "amountUser"
        }]
    }, ]
}

console.log(users.client[0]);

var array = ['pommes', 'poires', 'bananes'];

array.splice(1, 0, "fraises");
console.log(array);

for (let i = 0; i < array.length; i++) {
    console.log(array[i]);
}

$.each(array, function (index, value) { 
    console.log(index + "   " +  value);
});