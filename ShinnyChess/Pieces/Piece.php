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
    }
    
    public function isCaptured()
    {
        return $this->captured;
    }
    
    public function moveTo($newPosition)
    {
        $newField = new Field($newPosition);
        if(!$this->isCaptured())
        {
            if($this->moveBehavior->canMove($this->getCurrentField(), $newField))
            {
                Game::getInstance()->getBoard()->movePiece($this->getCurrentField(), $newField);
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