// Ciblage des éléments HTML
var move    = document.getElementById('move');
var square  = document.getElementById('square');

// Evènement 
move.addEventListener('click', make_move);

// Fonction de déplacement
function make_move() {
    var position = square.className;

    switch (position)
    {
        case 'so':
            square.className = "se";
            break;
        case 'se':
            square.className = "ne";
            break;
        case 'ne':
            square.className = "no";
            break;
        case 'no':
        default:
            square.className = "so";
            break;
    }
}

// On peu meme automatisé le déplacement!
// setInterval(make_move, 100);