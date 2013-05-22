<?php

namespace ShinnyChess\Moves;

use ShinnyChess\Board\Field;

abstract class Move
{
    protected $color;
    
    protected $currentField;
    
    public function __construct($color, Field $currentField)
    {
        $this->color = $color;
        $this->currentField = $currentField;
    }
    
    public abstract function canMove(Field $newField);
    
    public function isDiagonalMove(Field $newField)
    {
        return ($this->currentField->getXAxisPosition() - $newField->getXAxisPosition())
                == ($this->currentField->getYAxisPosition() - $newField->getYAxisPosition());
    }
    
    public function isVerticalMove(Field $newField)
    {
        return ($this->currentField->getXAxisPosition() == $newField->getXAxisPosition()) && 
                ($this->currentField->getYAxisPosition() != $newField->getYAxisPosition());
    }
    
    public function isHorizontalMove(Field $newField)
    {
        return ($this->currentField->getXAxisPosition() != $newField->getXAxisPosition()) && 
                ($this->currentField->getYAxisPosition() == $newField->getYAxisPosition());
    }
    
    public function isLMove(Field $newField)
    {
        $verticalDiff = abs($this->currentField->getYAxisPosition() - $newField->getYAxisPosition());
        $horizontalDiff = abs($this->currentField->getXAxisPosition() - $newField->getXAxisPosition());
        
        return ($verticalDiff == 1 && $horizontalDiff == 2) || ($horizontalDiff == 1 && $verticalDiff == 2);
    }
    
    public function isEnPassantMove()
    {
        
    }
}