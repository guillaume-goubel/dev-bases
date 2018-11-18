"use strict";

// Playlist Source
var source = "http://osw3.net/playlists.php"; 

// Retrieve declarations
var playLists = {};

// Retrieve Elements in JQUERY
var body = $('body');
var elmts_playlist = $('#play-list');



$(document).ready(function () {
    //=============================
    // Retrieve Elements & variable
    //=============================

    // Retrieve HTML Elements
    var elmts_btnGet = $('#get-play-list');

    //===================
    // Retrieve Playlist
    //===================

    // action de clic pour 1 évenement
    /*  console.log("B");
     console.log(playLists); */
    elmts_btnGet.on('click', function () {

        /* console.log("C");
        console.log(playLists); */
        setPlaylists(source);
        body.addClass('open');
        /* console.log("D");
        console.log(playLists); */
    });

    //ici pour plusieurs évenements = click et autre chose ....

    /* elmts_btnGet.on({
        click: function () { // 
            playLists = getPlaylists()
        } 
    });*/
});

/**
 * Set Playlist
 * 
 * @param (string) url
 * @return (object) Playlists
 */

function setPlaylists(source) {

    // AJAX REQUEST
    // $.ajax(url) == Méthode GET par défaut 
    $.ajax({
        method: "GET",
        url: source,
        dataType: "json",
        success: function (response) { // ici de la fonction success

            playLists = response;

            /* console.log("E");
            console.log(playLists);  */

            parsePlayLists();
            
            
            body.removeClass('open');


            /* console.log("F");
            console.log(playLists); */
        },

        error: function () { // ici de la fonction error
            alert("error");
        }
    });


    /* $.getJSON(url, function (response) { // raccourcis que en GET
        console.log(response)
    }); */

    /* //ON sucess
    .done(function () {
        alert("sucess");
    })

    //ON faild
    .fail(function () {
        alert("error");
    }) 

    //Do if request Done or Fail
    .always(function () {
        alert("complete");
    });*/
}

/* console.log("G");
console.log(playLists); */



function getPlaylists() {
    return playLists;

    /* console.log("H");
    console.log(playLists); */
}
/* console.log("I");
console.log(playLists); */




function parsePlayLists() {

    console.log("J");
        console.log(playLists); 

    var pl = getPlaylists();
    //console.log(pl.generator);
    //console.log(pl.lastUpdate);

    //var totalPlaylist = pl.playlists.length;
    //$('#play-list').append('<div class=totalPlayList></div>'); Mettre un élément enfant 
    var totalPlaylist_conc = pl.playlists.length;
    elmts_playlist.find("span").html(totalPlaylist_conc);

    //=========================
    // Créer les boutons
    //=========================

    // Je vide les boutons
    $('.playlistBtns').html('');

    // Je vide les listes


    $.each(pl.playlists, function (key, value) { //boucle via each

        var elem_count = $('<button></button>');
        elem_count.html(value.title);
        $('.playlistBtns').append(elem_count);


        //=========================
        // Créer les listes
        //=========================

        var elem_tracklist = $('<div></div>');

        var elem_tracklist_h3 = $('<h3></h3>');
        elem_tracklist_h3.html(value.title);


    });






    /*     for (let i = 0; i < pl.playlists.length; i++) { //boucle for pour récupérer les titres
            console.log(pl.playlists[i].title); 
            $('playlistBtns').append('<button></button>');
            $('playlistBtns').find("button").html(pl.playlists[i].title);
        }  */







}
/* console.log("K");
console.log(playLists); */