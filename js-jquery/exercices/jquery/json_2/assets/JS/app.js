"use strict";

//====================
//VARIABLES
//====================

// Retrieve declarations
var playLists = {};

// Retrive Elements
var Elmt_total_playList = $('#playList-total');
var Elmt_list_playList = $('#Playlist-list');
var Elmt_list = $('#list')

// Source AJAX
var source = "http://osw3.net/playlists.php"; 


$(document).ready(function () {


    //====================
    //VARIABLES
    //====================


    // Elements
    var btnDisplay = $('#btn-display');

    btnDisplay.on('click', function () {
        requestPlayLists(source);
    });

    function requestPlayLists(source) {

        $.ajax({
            method: "GET",
            url: source,
            dataType: "json",

            success: function (response) {
                playLists = response;
                alert("Fichier obtenu");

                parsePlayLists()

            },

            error: function () {
                alert("error");
            }

        });

    }

});


function parsePlayLists() {

    //Afficher le total des playlists disponibles

    var playLists_length = playLists.playlists.length;
    Elmt_total_playList.find('span').html(playLists_length);

    //Afficher 3 boutons avec les titres à l'intérieur

    Elmt_list_playList.html('');
    Elmt_list.html('');

    $.each(playLists.playlists, function (key, value) {

    
        var btn_list = $('<button></button>');
        Elmt_list_playList.append(btn_list);
        btn_list.html(value.title);

        var div_list = $('<div></div>');
        Elmt_list.append(div_list);

        var title_list = $('<h3></h3>');
        div_list.append(title_list);
        title_list.html(value.title);

        var list_ul_list = $('<ul></ul>');
        div_list.append(list_ul_list);

        var list_li_list = $('<li></li>');
        list_ul_list.append(list_li_list);

        var tracks = value.tracks;
        list_li_list.text(tracks);
        
        $.each(playLists.tracks, function (key, value) {
            list_li_list.html(value.artist);

        });

    });

}

var i = 7;

function change() {
    var i = 5;
    console.log(i)
}

console.log(i)
change();