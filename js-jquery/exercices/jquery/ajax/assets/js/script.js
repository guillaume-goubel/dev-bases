"use strict"

// Playlist source
var source = 'http://osw3.net/playlists.php';

// Variables declaration
var playlists = {};

var elem_btnGet;
var elem_playlists;
var elem_playlistsBtns;
var elem_playlistsTracks;

$(document).ready(function(){

    // ====================
    // Retrieve Elements & variables declaration
    // ====================
    
    // Retrieve HTML Elements
    elem_btnGet = $('#get-playlists');
    elem_playlists = $('#playlists');
    elem_playlistsBtns = $('.playlistsBtns');
    elem_playlistsTracks = $('.playlistsTracks');

    // ====================
    // Retrieve Playlists
    // ====================

    elem_btnGet.on('click', function(){
        $('.loader').show();

        // Retrieve all playlists by AJAX
        setPlaylists(source);
    });

});

/**
 * Set Playlist
 * 
 * @param (string) url address of playlists file
 * @return (object) Playlists
 */
function setPlaylists(url) 
{
    // AJAX request
    $.ajax({
        method: "GET",
        url: url,
        dataType: "json",
        success: function(response){
            // Set response to var playlists
            playlists = response;

            // Playlists treatment
            parsePlaylist();

            $('.loader').hide();
        },
        error: function(){
            alert( "Oops an error has occurred." );
        }
    });
}


function getPlaylist()
{
    return playlists;
}



function parsePlaylist() 
{
    // The Playlists Object
    var pl = getPlaylist();

    // Count & Display the total of playlist
    var total = pl.playlists.length;
    $('.totalPlaylists').find('span').html(total);


    // Destroy all btn already exists
    elem_playlistsBtns.empty();
    elem_playlistsTracks.empty();

    // Display each playlist's tracks
    $.each(pl.playlists, function(key, value){

        // Create Playlist Button
        var elem_plBtn = $('<button></button>');
            elem_plBtn.html(value.title);
            elem_plBtn.attr("data-key", key);
        elem_playlistsBtns.append(elem_plBtn);

        // Create Playlist Tracks list
        var elem_plTracksList = $('<div></div>'); // 
            elem_plTracksList.attr('id', key);
        
        if (key > 0)
        {
            elem_plTracksList.css({display: "none"});
            // elem_plTracksList.hide();
        }

        // Injection du titre de la playlist
        var elem_plTracksList_h3 = $('<h3></h3>');
            elem_plTracksList_h3.html(value.title);
        elem_plTracksList.append(elem_plTracksList_h3);
        
        // Injection de la liste des tracks
        var elem_ul = $('<ul></ul>');
        elem_plTracksList.append(elem_ul);

        // Boucle sur la liste des tracks
        $.each(value.tracks, function(key_1, track){

            var li_track = $('<li></li>');
            var div_artist = $('<div></div>');
            var div_title = $('<div></div>');

                div_artist.html(track.artist);
                div_title.html(track.title);

            li_track.append(div_artist);
            li_track.append(div_title);
            elem_ul.append(li_track);
        });

        elem_playlistsTracks.append(elem_plTracksList);
    });

    // Clic sur le bouton d'une playlist
    $('.playlistsBtns > button').on('click', function(){
        // On masque TOUTES les playlists
        $('.playlistsTracks > div').hide();

        // On affiche la playlist associée au bouton cliqué
        $('.playlistsTracks > #'+$(this).data('key')).show();
    });

}