// -- CONFIG

// On prépare la varible de configuration
var config = {};

// On ajoute la source jSon a la configuration
config.model = "model/images.json";

// On ajoute les chemins des répertoires d'images à la config
config.folders = {
    normal: "assets/images/normal/",
    small: "assets/images/small/",
};

// On prépare le tableau qui va recevoir la liste des fichier dans la config
config.files = [];




// -- DEFINITION DES FONCTIONS

// Déclaration de la fonction d'initialisation
// Cette fonction récupère la liste des fichiers, Appel la fonction qui affiche
// les miniature et appel la fonction qui affiche une image par défaut.
function init() 
{
    // Récupération de la liste des fichiers
    $.getJSON(config.model, function(files){

        // On ajoute les fichiers à la configuration
        config.files = files;

        // on initialise l'affichage des miniatures
        init_small();

        // On initialise l'affichage de la premiere image
        show_picture( config.files[0] );

        // // On initialise l'affichage de la premiere image
        // // Une image au hasard parmis la liste des images
        // var n = rand(config.files.length);
        // show_picture( config.files[n] );

    });
}

// Déclaration de la fontion chargée de créer la liste des miniature
// Cette fonction boucle sur la liste des fichiers definis dans la config, 
// Affiche les miniatures et ecoute le clic sur les miniatures
function init_small() {
    $.each(config.files, function(index, file){
    
        // On créer l'image miniature
        $small = $('<img>').attr('src', config.folders.small + file.src);
        
        // On ajoute la miniature dans l'élément <.small>
        $('.small').append( $small );
    
        // On écoute le clic sur la miniature
        $small.on('click', function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            show_picture(file);
        });
    
    });
}

// Déclaration de la fonction qui affiche l'image
function show_picture(file) 
{
    // On efface le contenu de l'element <.normal>
    $('.normal').html('')

    // On affiche l'image correspondante à la miniature cliquée
    .append( $('<img>').attr('src', config.folders.normal + file.src) )

    // On affiche le titre
    .append( $('<div>').addClass('title').html(file.title) );
}

function rand(n) {
    return Math.floor((Math.random() * n) + 1);
}



// -- INITIALISATION DE L'APP

// Appel de la fonction d'initialisation
init();