var replay = true;
var nombreOK = false;
var nombreATrouver = 0;
var nombreUtil = 0;
var nbEssais = 0;

while (replay) {
    nombreATrouver = Math.floor(Math.random() * 100); // On assigne un nombre à la variable.
    while (!(nombreOK) && nbEssais < 6) { // Tant que le nombre n'a pas été trouvé et que le nombre d'essais ne dépasse pas 6.
        nombreUtil = Number(prompt('Veuillez entrer un nombre entre 1 et 100 :')); // On demande un nombre à l'utilisateur.
        if (nombreUtil > 100) { // S'il dépasse les limites, on l'avertit.
            console.log('Le nombre est plus grand que 100 !');
        } else {
            if (nombreUtil < 0) {
                console.log('Le nombre est plus petit que 0 !');
                nbEssais++;
            } else {
                if (nombreUtil === nombreATrouver) { // Si c'est le bon nombre, on sort de la boucle.
                    alert('Bravo, le nombre était bien ' + nombreATrouver + '. Vous l\'avez trouvé en ' + nbEssais + 'essais.');
                    nombreOK = true;
                } else { // Sinon on lui dit si c'est plus petit / plus grand.
                    if (nombreUtil < nombreATrouver) {
                        console.log('Le nombre indiqué est plus petit que le nombre recherché. (' + nombreUtil + ')');
                    } else {
                        console.log('Le nombre indiqué est plus grand que le nombre recherché. (' + nombreUtil + ')');
                    }
                    nbEssais++;
                }
            }
        }
    }
    if (nbEssais >= 6) { // Après la boucle : Si on a dépassé le nombre d'essais, on affiche un message disant que le nombre n'est pas bon.
        alert('Game Over ! Le nombre à trouver était : ' + nombreATrouver);
    }

    var rejouerUtil = prompt('Voulez-vous rejouer une partie ? (Oui/Non)'); // On propose à l'utilisateur de rejouer.
    rejouerUtil = rejouerUtil.toLowerCase(); // Ligne pour simplifier les vérifications.
    if (rejouerUtil != "oui") {
        replay = false;
        alert('A la prochaine !');
    }
}
