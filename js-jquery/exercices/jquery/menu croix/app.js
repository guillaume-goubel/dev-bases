var toggle = $('#toggle');
var divMenu = $('#menu'); 

toggle.on('click', function () {

    $(this).toggleClass('on'); 
    divMenu.toggleClass('on'); 
    
});



