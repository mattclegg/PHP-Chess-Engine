<?php

namespace ShinnyChess\Pieces;

use ShinnyChess\Board\Field;
use ShinnyChess\Game;

class Piece
{
    protected $captured = false;
    
    protected $moveBehavior;
    
    protected $color;

    public function __construct($color)
    {
        $this->color = $color;
    }
    
    public function isCaptured()
    {
        return $this->captured;
    }
    
    public function moveTo($currentPosition, $newPosition)
    {
        $newField = new Field($newPosition);
        $currentField = new Field($currentPosition);
        if(!$this->isCaptured())
        {
            if($this->moveBehavior->canMove($currentField, $newField))
            {
                Game::getInstance()->getBoard()->movePiece($currentField, $newField);
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
    
}