<?php

namespace ChessEngine\Exceptions;

use \Exception;

class InvalidGameStateException extends \Exception
{
    protected $message = 'Invalid game state. Please use FEN or JSON.';
}