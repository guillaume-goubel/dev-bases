// Ciblage des élément HTML
var original = document.getElementById('original');
var copy = document.getElementById('copy');

// Fonction de copie
function make_copy() {
    copy.value = original.value;
}

// Evènement déclencheur de la copie
// - > quand la touche du clavier est relachée
original.addEventListener('keyup', make_copy);