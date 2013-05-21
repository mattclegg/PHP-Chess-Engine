<?php

namespace ShinnyChess\Pieces;

use ShinnyChess\Board\Field;

class Piece
{
    protected $captured = false;
    
    protected $owner;

    protected $moveBehavior;
    
    protected $color;


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
            $this->moveBehavior->move($this->getCurrentField(), $newField);
            $this->currentField = $newField;
        }
        else
        {
            
        }
    }
    
    public function getColor()
    {
        return $this->color;
    }
}