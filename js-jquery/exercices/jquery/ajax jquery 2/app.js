// ENNONCE
// Récupérer du listing des cryptos
// Généer un select avec la liste des cryptos <option value ="BTC">Bitoins</option>
// Quand on change la crypto sur le select , on affiche la valuer de la crypto en USD


"user strict";

/******************************
 * * VARIABLES
 ******************************/
var elmt_get_btc = $('#get_btc');
var elmt_list = $('#list');
var symbol;  


/*****************************
 * *FONCTIONS
 ****************************/
// Récupration de la list
function get_list() {

    $.ajax({
        url: "https://api.coinmarketcap.com/v2/listings/",
        success: show_list,
        error: function () {
            alert('failed list');
        }
    });
}

// La partie DOM LIST
function show_list(response) {

var lists = response.data;

$.each(lists, function (index, list) { 
    
    var elmt_option = $('<option>');

    elmt_option.attr("value", list.symbol );
    elmt_option.text(list.name);
    elmt_list.append(elmt_option); 

});

}

$(document).ready(function () {

    elmt_get_btc.on({

        'click': get_btc,
        'click': get_list
    });

    
    elmt_list.on('change', function () {

        symbol = $(this).val();
    
        $.ajax({
            url: 'https://api.coinmarketcap.com/v2/ticker/',
            success: show_crypto, // evenement qui appelle la fonction
            error: function () {
                alert('failed cryptos');
            }
        });
    });
    
});

// * La partie DOM SHOW
function show_crypto(response) {

    var cryptos = response.data;

    $.each(cryptos, function (index, crypto) {

        if (crypto.symbol === symbol) {

            console.log(crypto.quotes.USD.price);

        }

    });
}




