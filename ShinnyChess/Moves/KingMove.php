<?php

namespace ShinnyChess\Moves;

use ShinnyChess\Moves\AllDirectionMove;
use ShinnyChess\Board\Field;
use ShinnyChess\Exceptions\MoveException;

class KingMove extends AllDirectionMove
{
    public function canMove(Field $currentField, Field $newField)
    {
        $verticalDiff = abs($currentField->getYAxisPosition() - $newField->getYAxisPosition());
        $horizontalDiff = abs($currentField->getXAxisPosition() - $newField->getXAxisPosition());
        
        if($verticalDiff > 1 || $horizontalDiff > 1)
        {
            throw new MoveException('This piece cannot move more than one field at a time');
        }
        
        return parent::canMove($currentField, $newField);
    }
}