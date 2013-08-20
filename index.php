<?php

//echo "Simple usage: <br /><br /><br />";

include 'autoload.php';

use ChessEngine\Helpers\JsonState;

$json = new JsonState;
$json->addPiece('p', 'w', 'a3');
$json->addPiece('king', 'black', array(1,6));
//$json->setBlackCastling(JsonState::CASTLING_BOTH);
//$json->setWhiteCastling(JsonState::CASTLING_KINGS);
$json->setEnPassantField('a3');
die($json->getJson());

use ChessEngine\Game;

//$x = new Game('[{"piece":"king","color":"w","position":"a7"},{"piece":"king","color":"b","position":[5,4]}]');
//$x = new Game('[{"piece":"king","color":"w","position":"a1"}]');

//var_dump(Game::getBoard());

$game = Game::getInstance();

//$game->addState('[{"piece":"p","color":"w","position":"e2"},{"piece":"r","color":"b","position":"c2"},
//    {"piece":"b","color":"b","position":"e6"},{"piece":"q","color":"w","position":"f6"}]');
$game->setState('rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1');
//$game->addState('[{"piece":"king","color":"w","position":"b2"}]');

//var_dump($game->getBoard());
//$game->getBoard()->movePiece();
//var_dump($game->getBoard());

//$fieldsb = $game->getBoard()->getPieceAt('c2')->getMovableFields();
$fieldsn = $game->getBoard()->getPieceAt('e2')->getMovableFields();
//$fieldsBishop = $game->getBoard()->getPieceAt('d4')->getMovableFields();
//$fieldsQ = $game->getBoard()->getPieceAt('e4')->getMovableFields();

include 'testHtml.php';
?>

<script>
    var pieces = new Array();
    <? foreach($game->getBoard()->getAllPieces() as $piece) {
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

    var fields = new Array();
    <? foreach($fieldsn as $field) {
        echo 'fields.push("' . $field->getFieldIdentifier() . '");' . "\n";
    } ?>
    for (var i in fields)
    {
        var color = '#c48080';
        if($('#' + fields[i]).text().trim() != ''){
            console.log($('#' + fields[i]).text());
            color = '#bf0000';
        }
        $('#' + fields[i]).css({'background-color': color});
//        $('#' + i).text(fields[i]);
    }

</script>