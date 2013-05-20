<?php

namespace ShinnyChess\Moves;

use ShinnyChess\Moves\Move;
use ShinnyChess\Board\Field;

class CrossMove extends Move
{
    public function move(Field $currentField, Field $newField)
    {
        echo $currentField->getXAxisPosition();
    }
}