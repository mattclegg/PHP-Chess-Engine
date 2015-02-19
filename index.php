<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/"><!--[if lte IE 6]></base><![endif]-->
    <title>Home</title>
    <meta name="viewport" id="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=10.0,initial-scale=1.0" />
    <link href="/stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" data-skrollr-stylesheet/>
    <link href="/stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
    <!--[if IE]><link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" /><![endif]-->
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<?php

//echo "Simple usage: <br /><br /><br />";

include 'autoload.php';

use ChessEngine\Game;

use ChessEngine\States\GameState;
use ChessEngine\Pieces\PieceFactory;
use ChessEngine\Board\Field;
use ChessEngine\Helpers\Color;

function debug($x){
    print("<pre>");
    var_dump($x);
    print("</pre>");
}

$GameState = new GameState();
$GameState->addPiece(PieceFactory::createPiece('rook', Color::COLOR_WHITE, new Field('a1')));
$GameState->addPiece(PieceFactory::createPiece('knight', Color::COLOR_WHITE, new Field('b1')));
$GameState->addPiece(PieceFactory::createPiece('bishop', Color::COLOR_WHITE, new Field('c1')));
$GameState->addPiece(PieceFactory::createPiece('queen', Color::COLOR_WHITE, new Field('d1')));
$GameState->addPiece(PieceFactory::createPiece('king', Color::COLOR_WHITE, new Field('e1')));
$GameState->addPiece(PieceFactory::createPiece('bishop', Color::COLOR_WHITE, new Field('f1')));
$GameState->addPiece(PieceFactory::createPiece('knight', Color::COLOR_WHITE, new Field('g1')));
$GameState->addPiece(PieceFactory::createPiece('rook', Color::COLOR_WHITE, new Field('h1')));
$GameState->addPiece(PieceFactory::createPiece('pawn', Color::COLOR_WHITE, new Field('a2')));
$GameState->addPiece(PieceFactory::createPiece('pawn', Color::COLOR_WHITE, new Field('b2')));
$GameState->addPiece(PieceFactory::createPiece('pawn', Color::COLOR_WHITE, new Field('c2')));
$GameState->addPiece(PieceFactory::createPiece('pawn', Color::COLOR_WHITE, new Field('d2')));
$GameState->addPiece(PieceFactory::createPiece('pawn', Color::COLOR_WHITE, new Field('e2')));
$GameState->addPiece(PieceFactory::createPiece('pawn', Color::COLOR_WHITE, new Field('f2')));
$GameState->addPiece(PieceFactory::createPiece('pawn', Color::COLOR_WHITE, new Field('g2')));
$GameState->addPiece(PieceFactory::createPiece('pawn', Color::COLOR_WHITE, new Field('h2')));

$GameState->addPiece(PieceFactory::createPiece('rook', Color::COLOR_BLACK, new Field('a8')));
$GameState->addPiece(PieceFactory::createPiece('knight', Color::COLOR_BLACK, new Field('b8')));
$GameState->addPiece(PieceFactory::createPiece('bishop', Color::COLOR_BLACK, new Field('c8')));
$GameState->addPiece(PieceFactory::createPiece('queen', Color::COLOR_BLACK, new Field('d8')));
$GameState->addPiece(PieceFactory::createPiece('king', Color::COLOR_BLACK, new Field('e8')));
$GameState->addPiece(PieceFactory::createPiece('bishop', Color::COLOR_BLACK, new Field('f8')));
$GameState->addPiece(PieceFactory::createPiece('knight', Color::COLOR_BLACK, new Field('g8')));
$GameState->addPiece(PieceFactory::createPiece('rook', Color::COLOR_BLACK, new Field('h8')));
$GameState->addPiece(PieceFactory::createPiece('pawn', Color::COLOR_BLACK, new Field('a7')));
$GameState->addPiece(PieceFactory::createPiece('pawn', Color::COLOR_BLACK, new Field('b7')));
$GameState->addPiece(PieceFactory::createPiece('pawn', Color::COLOR_BLACK, new Field('c7')));
$GameState->addPiece(PieceFactory::createPiece('pawn', Color::COLOR_BLACK, new Field('d7')));
$GameState->addPiece(PieceFactory::createPiece('pawn', Color::COLOR_BLACK, new Field('e7')));
$GameState->addPiece(PieceFactory::createPiece('pawn', Color::COLOR_BLACK, new Field('f7')));
$GameState->addPiece(PieceFactory::createPiece('pawn', Color::COLOR_BLACK, new Field('g7')));
$GameState->addPiece(PieceFactory::createPiece('pawn', Color::COLOR_BLACK, new Field('h7')));


$game = Game::getInstance();
$game->setState($GameState);

include 'testHtml.php';
?>

<script>

    <?php
        $peices = array();

    ?>

    var pieces = new Array();
    <?php foreach($game->getBoard()->getAllPieces() as $piece) {
        echo 'pieces:"' . $piece->getCurrentField()->getFieldIdentifier() . '"] = "' . $piece->getColor() . '-'
                . join('', array_slice(explode('\\', get_class($piece)), -1)) . '";' . "\n";

            $peices[$piece->getCurrentField()->toAlgebraicNotation()] = array(
                'name' => join('', array_slice(explode('\\', get_class($piece)), -1)),
                'color' => $piece->getColor(),
                'moves' => $piece->getMovableFields()
            );

    }
        echo json_encode($peices, JSON_PRETTY_PRINT);

    ?>

    $('td').css({
        'background-size': ($('td').first().width() * 1.5) + 427
    });

    for (var i in pieces)
    {
        var color = '#999393';

        if(pieces[i].charAt(0) == '1')
        {
            color = '#d4d4d4';
        }
        $('#' + i).addClass(pieces[i]);
    }

</script>
</body>
</html>