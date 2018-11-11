//var idSport = document.getElementById("sport");
//
//var machin = document.getElementsByClassName("machin")[0]; // ici class machin est la même que article2
//console.log(machin);// collection sous la forme de tableau
//
//var art2 = document.getElementsByClassName("article2")[0];
//console.log(art2);// collection sous la forme de tableau
//
//art2.style.border = "2px solid red"; 
//
//var test =$('.article2');
//console.log(test);
//
////var test2 =$("p").fadeOut(); 


//-----------------------------------------------------

//$('.machin').css("color", "green"); // équivalent à
//
//$('.machin').css({ // équivalent à
//    color: "green"
//})
//
////-----------------------------------------------------
//
//$('#politique').css({ // équivalent à
//    background: "yellow",
//    padding: "1rem"
//});
//
//
//$('#politique')
//    .css("background", "yellow")
//    .css("padding", "1rem");


$(document).ready(function () {

    $('button').click(function () {

        //var sport = $('#sport');
        //var isDisplay = sport.css("display");//guetteur avec une seule chaine de caractères
        //
        //if (isDisplay == "block"){
        //    sport.css("display","none"); //sur la fonction on affecte les setteurs "none"
        //}
        //else {
        //    sport.css("display", "block")//sur la fonction on affecte les setteurs "block"
        //}
        //
        $('#sport').toggle();
        ////alert(hello.fr);

        //$('div span:first').css("color" , "red");

        //séelctionner via les attributs. ICI dans l'exemple, l'attibut bidule.

        $("[data-a]").css({
            background: "yellow",
        });


        $("[data-b]").css({
            backgroundcolor: "blue",
            padding: "1rem"
        });
    });


    var attribut_valor = $('#politique').attr("data-timeout"); // la valeur de l'attribut data-timeout
    console.log(attribut_valor);
    console.log(typeof (attribut_valor));

    var attribut_valor2 = $('#politique').data("timeout"); // autre facon de remplacer data-timeout
    console.log(attribut_valor2);
    console.log(typeof (attribut_valor2));

    var attribut_valor3 = $('#politique').data("timeout") * 2; // nouvelle attribution de data-timeout = 500 *2
    console.log(attribut_valor3);
    console.log(typeof (attribut_valor3));

    var attribut_valor4 = $('#politique').attr("data-timeout", attribut_valor3);
    console.log(attribut_valor4);
    console.log(typeof (attribut_valor4));


    $('button').on("click", function () { // ON CLICK

         alert("yo");

     });

    /* $('button').on({ // PASSAGE SOURIS + le click de la fonction ci-dessus

        mouseenter: function () {
            $(this).css("color", "red");
        },

        mouseleave: function () {
            $(this).css("color", "blue");
        },

        //click: function () {
        //    alert("yo")
        //},

    }); */

    $('#button2').keypress(function (e) { 
       
        var code = e.keyCode || e.which;
        //$('#user_text').html(code);
        $('#user_text').html(String.fromCharCode(code));
    });
            
    //récupérer la taille des caractères


});





