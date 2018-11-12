var elmt_btn = $('#btn');

$(document).ready(function () {

    $(elmt_btn).on("click", function () {

        $.ajax({
            url: "http://localhost/php2/jquery%20php%20jason/requete.php",
            success: function (response) {
                alert("Fichier obtenu");
            }
        });

    });

});