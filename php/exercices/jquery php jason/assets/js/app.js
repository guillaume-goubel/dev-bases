var elmt_btn = $('#btn');

$(document).ready(function () {

    

    $(elmt_btn).on("click", function () {

        $.ajax({
            url: "http://localhost/dev-bases/php/exercices/jquery%20php%20jason/requete.php",
            success: function (response) {
                alert("Fichier obtenu")
                playlists = response;
                
                /* console.log(playlists); */

                $.each(playlists, function (indexInArray, valueOfElement) { 
                    console.log(valueOfElement.name);
                });
            }
        });

    });

});

