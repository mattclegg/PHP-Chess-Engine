<?php

namespace ChessEngine;

use ChessEngine\Board\Board;
use ChessEngine\Parsers\ParserFactory;
use ChessEngine\States\GameState;

class Game
{
    private $parser;
    private $board;
    private static $instance;
    private $initiated = false;
    
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
    
    public function setState(GameState $gameState)
    {
        if($this->initiated)
        {
            throw new \Exception('Game already initiated. Please set game state.');
        }
        
        $this->board = new Board();
        
        foreach ($gameState->getPieces() as $piece)
        {
            $this->board->addPiece($piece, $piece->getCurrentField());
        }
        
        $this->initiated = true;
    }
    
    public function reset()
    {
        
    }
}