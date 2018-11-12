"user strict";

function get_ajax() {

    // Variable qui va stocker l'instance XMLhttprequest
    var xhr;

    //insrtance de l'objet XMLhttprequest

    if (window.ActiveXObject) { // IE
        xhr = new XMLHttpRequest('Microsoft.XMLHTTP');

    } else if (window.XMLHttpRequest) { //autres navigateurs
        xhr = new XMLHttpRequest();

    } else { // Navigateurs trop vieux pour supporter XMLhttprequest
        alert('votre navigateur est dépassé !');
    }

    //http://www.site.com
    //ftp://user:password@site.com


    // Est-ce que xhr n'est pas pas inutilisable
    if (xhr !== undefined){

        // PREPARER L'ETAT DE LA REQUETE
        xhr.open(
            "GET", // Method que nous utilisons à défaut
            "https://api.coinmarketcap.com/v2/listings/", //URL de la source ou fichier
            true, // async -> facultatif MAIS DOIT ACTIVE pour être asynchrone
            false, // Nom utilisateur -> facultatif
            false // Mote de passe           
        );


        // TRAITER L'ETAT DE LA REQUETE
        xhr.onreadystatechange = function()
        {

            //readyState
            // 0 : non envoyé
            // 1 : Connexion ouverte mais send() pas encore envoyé
            // 2 : Headers HTTP reçus,  send() appelé , les headears et statuts disponibles (icone en gris)
            // 3 : Chargement en cours... la réponse est partielle (icone en bleu)
            // 4 : Fini

            console.log('Ready State : ' + xhr.readyState);
            console.log('Status : ' + xhr.status);

            if(xhr.readyState === 4 && xhr.status === 200 ){

                console.log("tout s'est bien déroulé");
                console.log(xhr.responseText);
            }
        }
        /* xhr.setRequestHeader('Content-type' ,'application/json'); */

        //Envoi de la requete
        xhr.send();
        
    }







}