/**
 * 
 * DELETE
 * 
 */

// SANS LE SYSTEME DE PROMESSES

// $(document).ready(function(){

//     $('.btn-danger').on('click', function(e){
//         e.preventDefault();
//         var $a = $(this);
//         var url = $a.attr('href');
//         $a.text('Effacer');

//         $.ajax({
//             type: "GET",
//             url: url,
//             success : function(data,textStatus, jqxhr){
//                 $a.text('Delete en cours');
//                 console.log(jqxhr);
//                 $a.parents('table').fadeOut();


//             },
//             error : function(jqxhr , textStatus){
//                 $a.text('Effacer');
//                 alert(jqxhr.textStatus);
//             }
//         });

//         console.log(url);

        
//     });
  
//   }); 



/**
 * 
 * DELETE
 * 
 */
// AVEC LE SYSTEME DE PROMESSES

$(document).ready(function(){

    $('.table').on('click', '.btn-danger', function(e){ // ici on prend l'élément 'table' et on lui précise qu'il faut choicir le bouton btn-danger car la table est toujours présente et qu'il faut effacer le nouveau bouton
        e.preventDefault();
        var $a = $(this);
        var url = $a.attr('href');
        $a.text('Delete en cours');

        $.ajax(url)
        
        .done(function(data, textStatus, jqxhr){
            $a.css( "color" , "yellow" );
            $a.text('Delete en cours');
            $a.parents('tr').fadeOut(); // fait disparaitre les elements html passés via add.php
            

        })
        
        .fail(function(jqxhr){
            alert(jqxhr.responseText);
        })
        
        .always(function(){
            $a.text('Effacer');
        });

    });
  

/**
 * 
 * ADD
 * 
 */

    $('#form-add').on('submit', function(e){
        e.preventDefault();
        var $form = $(this);
        var url = $form.attr('action');
        $form.find('button').text('Ajout en cours');

        $.ajax({
            type: "post",
            url: url,
            data: $form.serializeArray() // les datas qui viennet du formulaire sont serialisés
        })

        .done(function(data, textStatus, jqxhr){
            $form.find('button').text('Ajout en cours');
            var $tr = $(jqxhr.responseText);
            $('table tbody').prepend($tr);  // fait apparaitre les elements html passés via add.php
            $tr.hide().fadeIn(); // fait d'abord disparaitre puais apparaitre les elements html passés via add.php
            $form.find('input').val(''); // fait disparaitre le contenue du formulaire
        })
        
        .fail(function(jqxhr){
            alert(jqxhr.responseText);
        })
        
        .always(function(){
            $form.find('button').text('Ajouter');
        });

    });














}); 



//////////////////////// ADD ////////////////////////////
