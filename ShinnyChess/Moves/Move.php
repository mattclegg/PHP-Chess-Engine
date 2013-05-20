<?php

namespace ShinnyChess\Moves;

use ShinnyChess\Board\Field;

abstract class Move
{
    public abstract function move(Field $currentField, Field $newField);
    
    public function isValidMove()
    {
        
    }
}