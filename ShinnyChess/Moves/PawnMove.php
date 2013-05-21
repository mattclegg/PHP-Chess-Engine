<?php

namespace ShinnyChess\Moves;

use ShinnyChess\Moves\Move;
use ShinnyChess\Board\Field;

class PawnMove extends Move
{
    public function canMove(Field $currentField, Field $newField)
    {
        return $this->isLMove($currentField, $newField);
    }
}