<?php

namespace ShinnyChess\Moves;

use ShinnyChess\Board\Field;

abstract class Move
{
    public abstract function canMove(Field $currentField, Field $newField);
    
    public function isDiagonalMove(Field $currentField, Field $newField)
    {
        return ($currentField->getXAxisPosition() - $newField->getXAxisPosition())
                == ($currentField->getYAxisPosition() - $newField->getYAxisPosition());
    }
    
    public function isVerticalMove(Field $currentField, Field $newField)
    {
        return ($currentField->getXAxisPosition() == $newField->getXAxisPosition()) && 
                ($currentField->getYAxisPosition() != $newField->getYAxisPosition());
    }
    
    public function isHorizontalMove(Field $currentField, Field $newField)
    {
        return ($currentField->getXAxisPosition() != $newField->getXAxisPosition()) && 
                ($currentField->getYAxisPosition() == $newField->getYAxisPosition());
    }
    
    public function isLMove(Field $currentField, Field $newField)
    {
        $verticalDiff = abs($currentField->getYAxisPosition() - $newField->getYAxisPosition());
        $horizontalDiff = abs($currentField->getXAxisPosition() - $newField->getXAxisPosition());
        
        return ($verticalDiff == 1 && $horizontalDiff == 2) || ($horizontalDiff == 1 && $verticalDiff == 2);
    }
    
    public function isEnPassantMove()
    {
        
    }
}