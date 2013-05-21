<?php

namespace ShinnyChess;

use ShinnyChess\RepresentationParser;
use ShinnyChess\RepresentationValidator;
use ShinnyChess\Board\Board;

class Game
{
    private $parser;
    private $board;
    private $initialized = false;
    private static $instance;
    
    //fen ili json(piece, color, field)
    private function __construct()
    {
    }
    
    public function getBoard()
    {
        if($this->initialized)
            return $this->board;
        else
            die('konju');
    }
    
    public static function getInstance()
    {
        if(!isset(self::$instance))
        {
            self::$instance = new Game;
        }
        return self::$instance;
    }
    
    public function addRepresentation($gameRepresentation)
    {
        //if initialized, throw ex
        $this->parser = new RepresentationParser;
        
        $pieces = $this->parser->getPieces($gameRepresentation);
        
        $this->board = new Board();
        
        foreach ($pieces as $piece)
        {
            $this->board->addPiece($piece);
        }
        
        $this->initialized = true;
    }
}