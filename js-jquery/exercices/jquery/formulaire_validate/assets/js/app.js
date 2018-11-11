"use strict";

//=======================
//variables
//=======================

// Data variables
var monemail = '';
var montelephone = '';
var montextarea = '';


var Users = {

    "informations": [{
        "mail": monemail,
        "telephone": montelephone
    }],

    "message": [{
        "message": montextarea
    }]

}

// Elements variables
var elmt_mon_email = $('#mon_email');
var elmt_montelephone = $('#mon_telephone');
var elmt_texte = $('#mon_textarea');

var btn_submit = $('#btn_submit');


$(document).ready(function () {

    //=======================
    //Formulaire rules
    //=======================

    $("#monFormulaire").validate({

        rules: {
            "montextarea": {
                "required": true,
                "minlength": 2,
                "maxlength": 60000
            },
            "monemail": {
                "email": true,
                "required": true,
                "maxlength": 255
            },
            "montelephone": {
                "regex": /^(\+33\.|0)[0-9]{9}$/
            }
        }
    });


    jQuery.extend(jQuery.validator.messages, {
        required: "Attention champs requis",
        remote: "votre message",
        email: "votre message",
        url: "votre message",
        date: "votre message",
        dateISO: "votre message",
        number: "votre message",
        digits: "votre message",
        creditcard: "votre message",
        equalTo: "votre message",
        accept: "votre message",
        maxlength: jQuery.validator.format("votre message {0} caractères."),
        minlength: jQuery.validator.format("votre message {0} caractères."),
        rangelength: jQuery.validator.format("votre message  entre {0} et {1} caractères."),
        range: jQuery.validator.format("votre message  entre {0} et {1}."),
        max: jQuery.validator.format("votre message  inférieur ou égal à {0}."),
        min: jQuery.validator.format("votre message  supérieur ou égal à {0}.")
    });

    
    jQuery.validator.addMethod(

        "regex",
        function (value, element, regexp) {
            if (regexp.constructor != RegExp)
                regexp = new RegExp(regexp);
            else if (regexp.global)
                regexp.lastIndex = 0;
            return this.optional(element) || regexp.test(value);
        }, "erreur expression reguliere"
    );


    //============================
    //Formulaire data recuperation
    //============================

/*     $(elmt_mon_email).keypress(function () {
        monemail = elmt_mon_email.val();
        console.log(monemail)
    }); */

    $(btn_submit).on('click', function () {

        monemail = elmt_mon_email.val(); 
        montelephone = elmt_montelephone.val();
        console.log(montelephone);
        montextarea = elmt_texte.val();
        console.log(montextarea);


        var Users = {

            "informations": {
                "mail": monemail,
                "telephone": montelephone
            },

            "message": {
                "message": montextarea
            }
        }



        console.log(Users);
    });

});