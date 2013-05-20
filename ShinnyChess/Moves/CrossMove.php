<?php

namespace ShinnyChess\Moves;

use ShinnyChess\Moves\MoveBehavior;
use ShinnyChess\Board\Field;

class CrossMove implements MoveBehavior
{
    public function move(Field $currentField, Field $newField)
    {
        echo $currentField->getXAxisPositon();
    }
}