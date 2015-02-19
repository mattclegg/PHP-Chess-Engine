<html>
<head>
    <style>
        table {
            border: 1px solid black;
        }
        table td {
            width: 100px;
            height: 100px;
            border: 1px solid black;
        }
    </style>
</head>
<body><?php

//echo "Simple usage: <br /><br /><br />";

include 'autoload.php';

use ChessEngine\States\GameState;
use ChessEngine\Pieces\PieceFactory;
use ChessEngine\Board\Field;
use ChessEngine\Game;

function debug($x){
    print("<pre>");
    var_dump($x);
    print("</pre>");
}

$GameState = new GameState();
$GameState->addPiece(PieceFactory::createPiece('rook', 'w', new Field('a1')));
$GameState->addPiece(PieceFactory::createPiece('knight', 'w', new Field('b1')));
$GameState->addPiece(PieceFactory::createPiece('bishop', 'w', new Field('c1')));
$GameState->addPiece(PieceFactory::createPiece('queen', 'w', new Field('d1')));
$GameState->addPiece(PieceFactory::createPiece('king', 'w', new Field('e1')));
$GameState->addPiece(PieceFactory::createPiece('bishop', 'w', new Field('f1')));
$GameState->addPiece(PieceFactory::createPiece('knight', 'w', new Field('g1')));
$GameState->addPiece(PieceFactory::createPiece('rook', 'w', new Field('h1')));


$game = Game::getInstance();
$game->setState($GameState);

include 'testHtml.php';
?>

<script>
    var pieces = new Array();
    <?php foreach($game->getBoard()->getAllPieces() as $piece) {
        echo 'pieces["' . $piece->getCurrentField()->getFieldIdentifier() . '"] = "' . $piece->getColor() . '-'
                . join('', array_slice(explode('\\', get_class($piece)), -1)) . '";' . "\n";
    } ?>

    for (var i in pieces)
    {
        var color = '#999393';

        if(pieces[i].charAt(0) == '1')
        {
            color = '#d4d4d4';
        }
        $('#' + i).css({'background-color': color});
        $('#' + i).text(pieces[i]);
    }




</script>
</body>
</html>