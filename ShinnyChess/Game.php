<?php

namespace ShinnyChess;

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
    
    public function addState($gameState)
    {
        //if initialized, throw ex
        $this->parser = new StateParser;
        
        $pieces = $this->parser->getPieces($gameState);
        
        $this->board = new Board();
        
        foreach ($pieces as $position => $piece)
        {
            $this->board->addPiece($piece, $position);
        }
        
        $this->initialized = true;
    }
    
    public function reset()
    {
        
    }
}