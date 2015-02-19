<?php

namespace ChessEngine;

use ChessEngine\Board\Board;
use ChessEngine\Parsers\ParserFactory;
use ChessEngine\States\GameState;

/**
 * Game class controlls everything
 */
class Game
{
    private $board;
    private static $instance;
    private $initiated = false;

    private function __construct()
    {

    }

    /**
     * Get board
     *
     * @return Board
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * Get instance of the game
     *
     * @return Game
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Game();
        }
        return self::$instance;
    }

    /**
     * Set initial game state
     *
     * @param GameState $gameState Initial game state
     */
    public function setState(GameState $gameState)
    {
        if ($this->initiated) {
            throw new \Exception(
                'Game already initiated. Please set game state.'
            );
        }

        $this->board = new Board();

        foreach ($gameState->getPieces() as $piece) {
            $this->board->addPiece($piece, $piece->getCurrentField());
        }

        $this->initiated = true;
    }

    /**
     * Reset game to initial state
     */
    public function reset()
    {
    }
}
