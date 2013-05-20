<?php

namespace ShinnyChess\Moves;

use ShinnyChess\Board\Field;

interface MoveBehavior
{
    public function move(Field $currentField, Field $newField);
}