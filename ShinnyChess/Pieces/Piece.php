<?php

namespace ShinnyChess\Pieces;

use ShinnyChess\Board\Field;

class Piece
{
    protected $captured = false;
    
    protected $owner;

    protected $moveBehavior;
    
    protected $color;
    
    protected $currentField;

    public function __construct($color, Field $currentField = null)
    {
        $this->color = $color;
        $this->currentField = $currentField;
    }
    
    public function isCaptured()
    {
        return $this->captured;
    }
    
    public function moveTo(Field $newField)
    {
        if(!$this->isCaptured())
        {
            if($this->moveBehavior->canMove($this->getCurrentField(), $newField))
            {
                $this->currentField = $newField;
                return true;
            }
            else
            {
                //ex
            }
        }
        else
        {
            
        }
    }
    
    public function getColor()
    {
        return $this->color;
    }
    
    public function getCurrentField()
    {
        return $this->currentField;
    }
}