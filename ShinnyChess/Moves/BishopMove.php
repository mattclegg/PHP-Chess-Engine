<?php

namespace ShinnyChess\Moves;

use ShinnyChess\Moves\Move;
use ShinnyChess\Board\Field;

class BishopMove extends Move
{
    public function canMove(Field $currentField, Field $newField)
    {
        return $this->isDiagonalMove($currentField, $newField);
    }
}