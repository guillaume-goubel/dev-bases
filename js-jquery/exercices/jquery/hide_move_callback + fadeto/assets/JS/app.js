$(document).ready(function () {


    //HIDE + CALLBACK
     $('div').on('click', function () {

         $(this).hide(500,

             function () {
                 $(this).show()
             });
     }); 


    //FADE TO
    $('div').on('click', function () {

        $(this).fadeTo(500, 0.8);

    });
 


    //SLIDE + animate
    $('div').on('click', function () {

        $(this).animate({left: "px"}, 800,'linear');

    });




});