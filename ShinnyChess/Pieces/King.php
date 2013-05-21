<?php

namespace ShinnyChess\Pieces;

use ShinnyChess\Pieces\Piece;
use ShinnyChess\Moves\CrossMove;
use ShinnyChess\Board\Field;

class King extends Piece
{
    public function __construct($color, Field $currentField = null)
    {
        parent::__construct($color, $currentField);
        $this->moveBehavior = new CrossMove();
    }
}