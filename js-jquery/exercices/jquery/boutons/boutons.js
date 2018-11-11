$('button').on({ // PASSAGE SOURIS + le click de la fonction ci-dessus

            mouseenter: function () {
                $(this).css("color", "red");
            },

            mouseleave: function () {
                $(this).css("color", "blue");
            },
        });



        

        
            $(document).ready(function () {

                $('button').click(function () {
            
                    //var sport = $('#sport');
                    //var isDisplay = sport.css("display");//guetteur avec une seule chaine de caractères
                    //
                    //if (isDisplay == "block"){
                    //    sport.css("display","none"); //sur la fonction on affecte les setteurs "none"
                    //}
                    //else {
                    //    sport.css("display", "block")//sur la fonction on affecte les setteurs "block"
                    //}
                    //
                    $('#sport').toggle();
                    ////alert(hello.fr);
            
                    //$('div span:first').css("color" , "red");
            
                    //séelctionner via les attributs. ICI dans l'exemple, l'attibut bidule.

                    });
                });