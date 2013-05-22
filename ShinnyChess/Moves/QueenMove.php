<?php

namespace ShinnyChess\Moves;

use ShinnyChess\Moves\Move;
use ShinnyChess\Board\Field;

class QueenMove extends Move
{
    public function canMove(Field $newField)
    {
        return $this->isDiagonalMove($this->currentField, $newField) || $this->isVerticalMove($this->currentField, $newField)
                || $this->isHorizontalMove($this->currentField, $newField);
    }
}