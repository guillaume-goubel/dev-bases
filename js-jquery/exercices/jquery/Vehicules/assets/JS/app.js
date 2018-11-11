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
var images_url = "http://osw3.net/tp/"

// Source AJAX
var source = "http://osw3.net/tp/vehicules.php"

$(document).ready(function () {

    $(Elmt_models_presentation).on('click', function () {

        $.ajax({
            method: "GET",
            url: source,
            dataType: "json",

            success: function (response) {
                garageLists = response;
                alert("Fichier obtenu");

                parseGarageLists()

                //console.log(garageLists);

            },

            error: function () {
                alert("error");
            }
        });

    });

});





function parseGarageLists() {
    // préciser le nombre de marques
    var brands = garageLists.length;
    Elmt_brandsList.find('span').html(brands);


    $.each(garageLists, function (key, value) {

        //remplir le tableau des marques
        var option_list = $("<option></option>");
        Elmt_brands_select.append(option_list);

        option_list.attr("value", value.models);
        option_list.html(value.constructor);

    });


    Elmt_brands_select.on('change', function () {

        $.ajax({
            method: "GET",
            url: 'http://osw3.net/tp/' + $(this).val(),
            dataType: "json",


            success: function (response2) {
                modelsLists = response2;
                //alert("Fichier obtenu");

                parseModelLists()

            },

            error: function () {
                alert("error");
            }
        });
    });
}






function parseModelLists() {

    Elmt_models_select.empty();
    Elmt_models_focus.empty();

    $.each(modelsLists.models, function (key, value) {

        var option_list = $("<option></option>");
        Elmt_models_select.append(option_list);
        option_list.html(value.name);
        option_list.attr("value", key);

        var table = $("<tr></tr>");
        Elmt_models_focus.append(table);

        var td = $("<td></td>");
        table.append(td);
        td.html(value.name);

        var td2 = $("<td></td>");
        table.append(td2);

        var img = $("<img></img>");
        td2.append(img);
        img.attr("src", images_url + value.illustration);


        //console.log(value);
    });




    Elmt_models_select.on('click', function () {

        Elmt_models_presentation.empty();

        var img = $("<img></img>");
        Elmt_models_presentation.append(img);
        img.attr("src", images_url + modelsLists.models[$(this).val()].poster);

    });


}