"use strict";


var elmt_user_name = $('#user_name');
var elmt_div_parent = $('#toto');

var elmt_radio =$('.titi')

var elmt_check_sexeUser1 = $('sex-user1')
var elmt_check_sexeUser2 = $('sex-user2')

var form = $('#form');
var btn_submit = $('#btn_submit');
var btn_submit2 = $('#btn_submit2');

var userName = '';
var sexeUser = '';

var array_users = {

    "identity": [{
        'nom': userName,
        'sexe': sexeUser
    }, ]
}

console.log('A');
console.log(array_users.identity[0].nom);

$(document).ready(function () {

    $(btn_submit).on('click', function () {

        userName = elmt_user_name.val();
        sexeUser = $("input:checked").val();

        console.log('B');
        console.log(userName);

        console.log('Bprim');
        console.log(sexeUser);

        array_users = {

            "identity": [{
                'nom': userName,
                'sexe': sexeUser
            }, ]
        }

        console.log('C');
        console.log(userName);

        console.log('D');
        console.log(array_users.identity[0].nom);

        parse();
    });

    function get() {

        return array_users;
    }

    function parse() {

        array_users = get();




        $(btn_submit2).on('click', function () {

            console.log('E');
            console.log(array_users.identity[0].nom);
            console.log(array_users.identity[0].sexe);

            btn_submit2.attr({
                "class": "on"
            })

            $.each(array_users.identity, function (key, value) {
                console.log('F');
                console.log(value.nom);
                console.log(value.sexe);
                
                var elmt_div_name = $('<div></div>');
                var elmt_div_sexe = $('<div></div>');

                elmt_div_parent.append(elmt_div_name);
                elmt_div_parent.append(elmt_div_sexe);

                elmt_div_name.html(value.nom);
                elmt_div_sexe.html(value.sexe);
            });
        });
    }
});