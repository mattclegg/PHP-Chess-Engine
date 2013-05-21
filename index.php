<?php

echo "Simple usage: <br /><br /><br />";

include 'autoload.php';

use ShinnyChess\Game;

//$x = new Game('[{"piece":"king","color":"w","position":"a7"},{"piece":"king","color":"b","position":[5,4]}]');
//$x = new Game('[{"piece":"king","color":"w","position":"a1"}]');

//var_dump(Game::getBoard());

$game = Game::getInstance();

//$game->addRepresentation('[{"piece":"king","color":"w","position":"a7"},{"piece":"king","color":"b","position":[5,4]}]');
$game->addRepresentation('[{"piece":"king","color":"w","position":"a7"}]');

var_dump($game->getBoard());
$game->getBoard()->getPieceAtPosition('a7')->moveTo("a6");
var_dump($game->getBoard());