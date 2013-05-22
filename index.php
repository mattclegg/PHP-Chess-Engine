<?php

echo "Simple usage: <br /><br /><br />";

include 'autoload.php';

use ShinnyChess\Game;

//$x = new Game('[{"piece":"king","color":"w","position":"a7"},{"piece":"king","color":"b","position":[5,4]}]');
//$x = new Game('[{"piece":"king","color":"w","position":"a1"}]');

//var_dump(Game::getBoard());

$game = Game::getInstance();

$game->addState('[{"piece":"king","color":"w","position":"b2"},{"piece":"king","color":"b","position":"b3"}]');
//$game->addState('[{"piece":"king","color":"w","position":"b2"}]');

//var_dump($game->getBoard());
//$game->getBoard()->movePiece();
//var_dump($game->getBoard());

$game->getBoard()->getPieceAtPosition('b2')->getMovableTo('b2');