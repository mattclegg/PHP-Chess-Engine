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
}