<?php

namespace ShinnyChess\Exceptions;

use \Exception;

class InvalidPieceNameException extends \Exception
{
    protected $message = 'Invalid piece name.';
}