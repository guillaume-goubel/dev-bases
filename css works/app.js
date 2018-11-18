

$(document).ready(function () {
    
    //Variable
    var menu_ul = $('.menu > li > ul');
    var menu_a = $('.menu > li > a');

    // Les éléements ul sont cachés au chargement de la page
    menu_ul.hide ();

    $(menu_a).on('click', function (e) {
        e.preventDefault();
        if(!$(this).hasClass('active')) {
            menu_a.removeClass('active');
            menu_ul.filter(':visible').slideUp('normal');
            $(this).addClass('active').next().stop().slideDown('normal');

        } else {
            $(this).removeClass('active');
            $(this).next().stop(true,true).slideUp('normal');
        }
    });

    
    


});
