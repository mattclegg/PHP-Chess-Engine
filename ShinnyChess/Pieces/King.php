<?php

namespace ShinnyChess\Pieces;

use ShinnyChess\Pieces\Piece;
use ShinnyChess\Moves\CrossMove;
use ShinnyChess\Board\Field;

class King extends Piece
{
    public function __construct(Field $currentField = null)
    {
        parent::__construct($currentField);
        $this->moveBehavior = new CrossMove();
    }
}