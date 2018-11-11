"use strict"


var elmt_container = $('.main-container')[0];
var elmt_container_div = $('.main-container  div');

/* console.log(elmt_container);
console.log(elmt_container_div);

 */
var elmt_div1 = $('#test1');
var elmt_div1_bis = $('#test1-on')


var elmt_div2 = $('#test2');
var elmt_div3 = $('#test3');
var elmt_div4 = $('#test4');

var elmt_buttons = $('#buttons');

var elmt_div = $('<div></div>')

var btn = $('#btn');
var btn_on = $('<input></input>');




$(document).ready(function () {


    btn.on('click', function () {

        btn.hide();

        elmt_buttons.append(btn_on);

        btn_on.attr({
            "type": "button",
            "id": "btn-on",
            "value": "toto"
        })

        elmt_div1.attr('id', 'test1-on');
        elmt_div2.attr('id', 'test2-on');
        elmt_div3.attr('id', 'test3-on');
        elmt_div4.attr('id', 'test4-on');
    });


    btn_on.on('click', function () {
        elmt_div1.attr('id', 'test1');
        elmt_div2.attr('id', 'test2');
        elmt_div3.attr('id', 'test3');
        elmt_div4.attr('id', 'test4');

    });




});