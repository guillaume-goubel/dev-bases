"use strict";


//=======================
//VARIABLES
//=======================

//Elements 
var Elmt_brandsList = $('#brands-list');

var Elmt_brands_select = $('#brands_select');

var Elmt_models_select = $('#models_select');
var Elmt_models_focus = $('#models-focus');

var Elmt_models_presentation = $('#models-presentation');

var Elmt_brands_logo = $('#logo');

var btn_get_list = $('#btn_get_list');

//
var garageLists = {};
var modelsLists = {};
var images_url = "http://osw3.net/tp/" // L'URL de BASE POUR LES IMAGES

// Source AJAX
var source = "http://osw3.net/tp/vehicules.php"


$(document).ready(function () {

    $(btn_get_list).on('click', function () {

        $.ajax({
            method: "GET",
            url: source,
            dataType: "json",

            success: function (response) {
                garageLists = response;
               
                alert("Fichier obtenu");
               
                parseGarageLists(); // RENVOIE VERS LA FONCTION QUI VA S'OCCUPER DE METTRE EN PAGE

            },

            error: function () {
                alert("error");
            }
        });

    });

});



// 1 REMPLISSAGE DU SELECT AVEC TOUTES LES MARQUES EN HTML

function parseGarageLists() {

    
    // préciser le nombre de marques
    var brandsList = garageLists.length;
    Elmt_brandsList.find('span').html(brandsList);

    //Vider le tableau des marques 
    Elmt_brands_select.empty();

    $.each(garageLists, function (key, value) {

        //remplir le tableau des marques
        var option_list = $("<option></option>");
        Elmt_brands_select.append(option_list);

        option_list.attr("value", value.models);
        option_list.html(value.constructor);
    });

}

// 1 AFFICHER LES NOMS DES MODELES + les PHOTOS DES MODELES DES LE CHANGEMENT DANS LE SELECT

    Elmt_brands_select.on('change', function () {

        // Dès le changemnt dans le select -> requete AJAX
        $.ajax({
            method: "GET",
            url: 'http://osw3.net/tp/' + $(this).val(),
            dataType: "json",

            success: function (response) {
                modelsLists = response;
                //alert("Fichier obtenu");

                console.log(modelsLists);

                parseModelLists();// RENVOIE VERS LA FONCTION QUI VA S'OCCUPER DE METTRE EN PAGE LE RESULTAT DE LA REQUETE

            },

            error: function () {
                alert("error");
            }
        });
    });


function parseModelLists() {

    //vider le logo de la marque
    Elmt_brands_logo.empty();

    //Mettre le logo de la marque
    var img = $("<img WIDTH=150 HEIGHT=150></img>");
    Elmt_brands_logo.append(img);

    // La source du logo et issu du nom du constructor qui possede une majuscule et pas de tiret.
    var str = modelsLists.constructor.toLowerCase();
    var ParamStr = str.replace(" ", "-"); 
    img.attr("src", 'http://osw3.net/tp/images/brands/'  + ParamStr +'.png');

   
    Elmt_models_select.empty();
    Elmt_models_focus.empty();

    $.each(modelsLists.models, function (key, value) { // Ne pas oublier de préciser .models 

        
        

        // Mise à jour de la liste des modeles dans le select des différents modèles
        var option_list = $("<option></option>");
        Elmt_models_select.append(option_list);
        option_list.attr("value", key);
        option_list.html(value.name);
        
        // Mettre le nom et les images dans un tableua dynamique
        var table = $("<tr></tr>");
        Elmt_models_focus.append(table);

            // Le nom td de gauche
            var td = $("<td></td>");
            table.append(td);
            td.html(value.name);

            // Les images td de droite
            var td2 = $("<td></td>");
            table.append(td2);

            var img = $("<img></img>");
            td2.append(img);
            img.attr("src", images_url + value.illustration);
    });


    Elmt_models_select.on('click', function () {

        Elmt_models_presentation.empty();

        // Mettre l'image en poster en fonction de l'index issu de la valeur de Elmt_models_select
        var img = $("<img></img>");
        Elmt_models_presentation.append(img);
        img.attr("src", images_url + modelsLists.models[$(this).val()].poster);

    });


}