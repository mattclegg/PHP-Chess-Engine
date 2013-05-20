<?php

namespace ShinnyChess\Pieces;

use ShinnyChess\Board\Field;

class Piece
{
    private $captured = false;
    
    private $currentField = false;

    protected $moveBehavior;
    
    public function __construct(Field $currentField = null)
    {
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
    
    public function getCurrentField()
    {
        return $this->currentField;
    }
}