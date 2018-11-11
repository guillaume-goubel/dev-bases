"use strict";




//Année----------------------------------------------------















//===============
//Elements HTML
//===============
var elmt_bonjour = $('#bonjour');
var elmt_fNameUser = $('#fNameUser');

var elmt_date = $('#date');
var elmt_infos_client = $('#infos-client');


var elmt_solde = $('#solde');
var elmt_solde2 = $('#solde2');
var elmt_actualy_compte = $('#actualy-compte');

var elmt_operations_results = $('#operations_results');
var elmt_operations_container = $('.operations-container');

var elmt_credit_operations = $('#credit-operations');
var elmt_dedit_operations = $('#debit-operations');

var elmt_solde_presentation = $('#solde-presentation')

//==================
//Elements create JS
//==================

var elmt_div_create = $('<div></div>');

var btn_credit = $('#btn-credit');
var btn_debit = $('#btn-debit');
var btn_log = $('#btn-log');
var btn_delog = $('#btn-delog');


//===============
//Variables
//===============

//date=====================================================
var date = new Date();
var nbrDay = date.getDate();

var mounth = date.getMonth();
var mounth_arr = ["janvier", "févier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "décembre"];
var mounth_fr = mounth_arr[mounth]; //récupération du mois en francais via l'index du tableau mounth_arr
var year = date.getFullYear();



TODO:
    var date_total = nbrDay + '  ' + mounth_fr + '  ' + year;
console.log(date_total);



//client====================================================
var sexUser = '';
var fNameUser = '';
var amountUser = ''; //compte du client

var client_Number = Math.floor(Math.random() * 10000) + ' - EFR - ' + Math.floor(Math.random() * 10000);


var users = {

    "client": [{
        "Numéro client": client_Number,
        "Type": "particulier",
        "Adresse": "58 rue de Balfour , 59510 HEM",
        "Email": "client@labp.com",
        "sex": sexUser,
        "fName": fNameUser,
        "sold": [{
            "amount": amountUser
        }]
    }, ]
}




//suivi des opérations de débits / crédits
var operations = {
    credit: [],
    debit: []
};


$(document).ready(function () {

    btn_delog.css({
        "display": "none"
    })

    // boucle sur le compte et sur le nom
    $.each(users.client, function (key, value1) {

        elmt_bonjour.find(elmt_fNameUser).html('  ' + value1.sex + '  ' + value1.fName);

        $.each(value1.sold, function (key2, value2) {
            elmt_solde.html(value2.amount + ' Euros');
            amountUser = value2.amount;
        });
    });


    $(btn_log).on('click', function () {

        sexUser = prompt('Prénom');

        while (true) {
            
            if(sexUser === '' || typeof(sexUser) != 'string'){
                alert('Prénom incorrect');
                sexUser = prompt('Prénom');
            }else {
                break;
            }
        }  
        
        fNameUser = prompt('nom');

        while (true) {
            
            if(fNameUser === '' || typeof(fNameUser) != 'string'){
                alert('Nom incorrect');
                fNameUser = prompt('Prénom');
            }else {
                break;
            }
        }  


        amountUser = Math.floor(Math.random() * 10000);

        elmt_bonjour.find(elmt_fNameUser).html(' Bonjour  ' + sexUser + '  ' + fNameUser);
        elmt_solde.html(amountUser);

        elmt_date.html('Date : ' + date_total);

        $.each(users.client[0], function (key, value) {

            console.log(key + " " + value);

            var elmt_div_create = $('<div></div>');
            elmt_div_create.attr({
                id: key
            }, );

            elmt_infos_client.append(elmt_div_create);
            elmt_div_create.html(key + ' : ' + value);
        });

        elmt_operations_container.css({
            "display": "flex"
        })
        elmt_solde_presentation.css({
            "display": "none"
        })

        btn_log.css({
            "display": "none"
        })

        btn_delog.css({
            "display": "block"
        })


    });


    $(btn_credit).on('click', function () {

        elmt_credit_operations.attr("class", 'credit').empty();

        var new_MountUser = Number(prompt(' crédit combien ?'));
        operations.credit.push(new_MountUser);

        $.each(operations.credit, function (key, value) {
            var elmt_div_create = $('<div></div>');

            elmt_div_create.attr({
                id: key,
                class: 'credit'
            });

            elmt_credit_operations.append(elmt_div_create);
            elmt_credit_operations.find(elmt_div_create).html("crédit de " + value + " Euros");
        });

        amountUser = amountUser + new_MountUser;
        elmt_solde2.html(amountUser + ' Euros');

        elmt_solde_presentation.removeAttr("class", "off");

        elmt_actualy_compte.css({
            "display": "none"
        })

        elmt_solde_presentation.css({
            "display": "block"
        })

        btn_delog.css({
            "display": "block"
        })


    });




    $(btn_debit).on('click', function () {

        elmt_dedit_operations.attr("class", 'debit').empty();

        var new_MountUser = Number(prompt('debit combien ?'));
        operations.debit.push(new_MountUser);

        $.each(operations.debit, function (debitkey, value) {
            var elmt_div_create = $('<div></div>');

            elmt_div_create.attr({
                id: debitkey,
                class: 'debit'
            });

            elmt_dedit_operations.append(elmt_div_create);
            elmt_dedit_operations.find(elmt_div_create).html("debit de " + value + " Euros");
        });

        amountUser = amountUser - new_MountUser;
        elmt_solde2.html(amountUser + ' Euros');

        elmt_solde_presentation.removeAttr("class", "off");

        elmt_actualy_compte.css({
            "display": "none"
        })

        elmt_solde_presentation.css({
            "display": "block"
        })

    });

});



btn_delog.click(function () {
    location.reload();
});
