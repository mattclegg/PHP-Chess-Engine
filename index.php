<?php

echo "Simple usage: <br /><br /><br />";

include 'autoload.php';

use ShinnyChess\Game;

$x = new Game('[{"piece":"king","color":"w","position":"a7"},{"piece":"king","color":"b","position":[5,4]}]');