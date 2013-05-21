<?php

namespace ShinnyChess\Moves;

use ShinnyChess\Moves\Move;
use ShinnyChess\Board\Field;

class RookMove extends Move
{
    public function canMove(Field $currentField, Field $newField)
    {
        return $this->isVerticalMove($currentField, $newField) || $this->isHorizontalMove($currentField, $newField);
    }
}