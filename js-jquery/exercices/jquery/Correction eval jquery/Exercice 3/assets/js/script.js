// Ciblage des éléments HTML
var input   = document.getElementById('input');
var number  = document.getElementById('number');
var square  = document.getElementById('square');
var cube    = document.getElementById('cube');

// Fonctions de calcul
function calculation() 
{
    var n = parseInt(input.value);

    number.innerHTML = n;
    square.innerHTML = make_square(n);
    cube.innerHTML   = make_cube(n);
}
function make_square(n) 
{
    return n*n;
}
function make_cube(n) 
{
    return n*n*n;
}

// Evènement déclencheur du calcul
// - > quand la touche du clavier est relachée
input.addEventListener('keyup', calculation);

// déclenchement du calcul au chargement de la page
calculation();