<?php

namespace ShinnyChess\Exceptions;

use \Exception;

class InvalidGameRepresentationException extends \Exception
{
    protected $message = 'Invalid game representation. Please use FEN or JSON.';
}