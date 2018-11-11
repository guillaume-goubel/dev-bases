var listPrenom = [
    "Jean",
    "John",
    "Maurice",
    "Guy",
    "Alphonse"
]

// MA VERSION
function afficherPrenom(prenom) {
    return ("bonjour " + prenom)
}


for (i = 0; i < listPrenom.length; i++) {
    console.log("bonjour " + listPrenom[i]);
}

afficherPrenom();


// VERSION CORRIGEE

/*
var names = ["Bruce", "Franck", "Jo", "Marie"];

function sayHello(name) 
{
    console.log("bonjour " + name);
}

for (let i = 0; i < names.length; i++) 
{
    sayHello(names[i]);
}
*/