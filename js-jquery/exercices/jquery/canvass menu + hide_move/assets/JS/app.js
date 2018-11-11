"use strict";

// 1ere façon
/* $(document).ready(function () {

    // HTML élements
    var offCanvas = $('#off-canvas');
    var btnOpen = $('#btn-open-canvas');
    var btnClose = $('#btn-closed-canvas');


    //OPEN CANVAS
    //offCanvass.on('click' , ()=>{}); autre manière de déclarer une fonction anonyme
    btnOpen.on('click', function () {

        //offCanvas.css('left', 0);
        offCanvas.animate({
            left: 0
        }, 800, 'linear');

        $('body').css('background-color', 'grey');
    });


    //OFF CANVAS
    btnClose.on('click', function () {

        //offCanvas.css('left', "-280px");
        offCanvas.animate({
                left: "-280px"
            }, 800,
            'linear');

            $('body').css('background-color', 'white');
    });

}); */





// 2ème façon
$(document).ready(function () {

    var body = $('body');
    var offCanvas = $('#off-canvas');
    var btnOpen = $('#btn-open-canvas');
    var btnClose = $('#btn-closed-canvas');

    //OPEN CANVAS
    //offCanvass.on('click' , ()=>{}); autre manière de déclarer une fonction anonyme
    btnOpen.on('click', function () {
       
        body.addClass('open');
    });

    //OFF CANVAS
    btnClose.on('click', function () {       
        body.removeClass('open');
    });

});




