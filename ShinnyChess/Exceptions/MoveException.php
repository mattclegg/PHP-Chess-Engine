<?php

namespace ShinnyChess\Exceptions;

use \Exception;

class MoveException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}