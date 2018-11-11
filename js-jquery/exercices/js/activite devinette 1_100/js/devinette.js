console.log("Bienvenue dans ce jeu de devinette ! Vous avez 6 essais pour trouver le bon chiffre ou le bon nombre !");


// Détermination de la variable solution
var solution = Math.floor(Math.random() * 100) + 1;
console.log(solution);


var nombreEssais = 0

while (nombreEssais < 3) 
{
    var nombreChoisi = Number(prompt(" Choisir un chiffre ou un nombre entre 1 et 100 compris !!"));
    
    if (nombreChoisi === solution) {
        console.log("gagné");
        nombreEssais++
        break;
    }

    if (nombreChoisi > solution) {
        console.log(nombreChoisi + " est trop grand ! ");
   
    } else {
         console.log(nombreChoisi + " est trop petit ! ");
    }
    nombreEssais++
    }

if (nombreChoisi === solution) {
    console.log("gagné en " + nombreEssais );
}else{
    console.log("la solution etait " + solution );
}
    

