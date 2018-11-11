"use strict";


//=======================
//VARIABLES
//=======================

//Elements 
var Elmt_brandsList = $('#brands-list');
var Elmt_brands_select = $('#brands_select');
var Elmt_models_select = $('#models_select');
var Elmt_models_focus = $('#models-focus');
var Elmt_models_presentation = $('#models-presentation')


//
var garageLists = {};
var modelsLists = {};
var base_url = "http://osw3.net/tp/"

// Source AJAX
var source = "http://osw3.net/tp/vehicules.php"

$(document).ready(function () {

    $.ajax({
        method: "GET",
        url: source,
        dataType: "json",
        success: function (response) {

            garageLists = response;
            console.log(garageLists);

            parseGarageLists()
        }

    });


    function parseGarageLists(){


        console.log(garageLists);

        $.each(garageLists, function (key, value) { 
             
            var div = $('<div></div>');
            $('#models-focus').append(div);
            div.html(garageLists[key].constructor);

        });



    }




});