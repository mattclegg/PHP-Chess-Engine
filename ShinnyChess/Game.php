<?php

namespace ShinnyChess;

use ShinnyChess\Board\Board;
use ShinnyChess\Parsers\ParserFactory;

class Game
{
    private $parser;
    private $board;
    private static $instance;
    private $initiated = false;
    
    //fen ili json(piece, color, field)
    private function __construct()
    {
    }
    
    public function getBoard()
    {
        return $this->board;
    }
    
    public static function getInstance()
    {
        if(!isset(self::$instance))
        {
            self::$instance = new Game();
        }
        return self::$instance;
    }
    
    public function setState($gameState = null)
    {
        if($this->initiated)
        {
            throw new \Exception('Game already initiated. Please set game state.');
        }
        
        if($gameState == null)
        {
            $gameState = $this->getDefaultState();
        }
        
        $this->parser = new ParserFactory($gameState);
        
        $this->parser->parse();
        
        $pieces = $this->parser->getPieces();
        
        $this->board = new Board();
        
        foreach ($pieces as $position => $piece)
        {
            $this->board->addPiece($piece, $position);
        }
        
        $this->initiated = true;
    }
    
    public function reset()
    {
        
    }
    
    private function getDefaultState()
    {
        return 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1';
    }
}