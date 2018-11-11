var Elm_regionPresentation = $('.regionPresentation');



$(document).ready(function () {

    $("[id*='region_']").on('mouseover', function () {


        var AllRegion = $("[id*='region_']");

        var region = $(this);
        AllRegion.css({
            'fill': 'rgb(252, 179, 179)'
        });

        region.css({
            'fill': 'red'
        });

    });


    $("[id*='region_']").on('click', function () {

        

        var region = $(this);
        var regionId = $(this).attr('id');
        var AllRegion = $("[id*='region_']");

        AllRegion.css({
            'fill': 'rgb(175, 158, 158)'
        });

        region.css({
            'fill': 'blue'
        });

        function replaceAll(recherche, remplacement, chaineAModifier) {
            return chaineAModifier.split(recherche).join(remplacement);
        }

        var go = replaceAll("_", " ", regionId);
        go = go.replace("region","Région");

        var div = $('<div></div>');
        
        Elm_regionPresentation.empty();
        div.html(go);
        $(Elm_regionPresentation).append(div);


    });

});