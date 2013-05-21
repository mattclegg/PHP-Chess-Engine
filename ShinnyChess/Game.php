<?php

namespace ShinnyChess;

use ShinnyChess\RepresentationParser;
use ShinnyChess\RepresentationValidator;

class Game
{
    
    private $parser;
    
    //fen ili json(piece, color, field)
    public function __construct($gameRepresentation)
    {
        $this->parser = new RepresentationParser;
        
        $pieces = $this->parser->getPieces($gameRepresentation);
        die(print_r($pieces));
    }
}