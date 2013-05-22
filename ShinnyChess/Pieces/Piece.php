<?php

namespace ShinnyChess\Pieces;

use ShinnyChess\Board\Field;
use ShinnyChess\Game;

class Piece
{
    protected $captured = false;
    
    protected $moveBehavior;
    
    protected $color;
    
    protected $currentField;

    public function __construct($color, Field $currentField = null)
    {
        $this->color = $color;
        $this->currentField = $currentField;
        
        if($currentField == null)
        {
            $this->captured = true;
        }
    }
    
    public function isCaptured()
    {
        return $this->captured;
    }
    
    public function canMove(Field $currentField, Field $newField)
    {
        if(!$this->isCaptured())
        {
            return $this->moveBehavior->canMove($currentField, $newField);
        }
        else
        {
            
        }
    }
    
    public function getColor()
    {
        return $this->color;
    }
    
    public function getMoveBehavior()
    {
        return $this->moveBehavior;
    }
    
    public function getMovableTo($position)
    {
        return $this->moveBehavior->getMovableTo(new Field($position));
    }
    
    public function getCurrentField()
    {
        return $this->currentField;
    }
    
}