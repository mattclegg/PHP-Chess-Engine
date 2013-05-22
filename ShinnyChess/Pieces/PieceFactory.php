<?php

namespace ShinnyChess\Pieces;

use ShinnyChess\Board\Field;

class PieceFactory
{
    public static function createPiece($pieceName, $pieceColor, Field $field = null)
    {
        switch ($pieceName)
        {
            case 'king': case 'k':
                return new King($pieceColor, $field);
            case 'rook': case 'r':
                return new Rook($pieceColor, $field);
            case 'bishop': case 'b':
                return new Bishop($pieceColor, $field);
            case 'queen': case 'q':
                return new Queen($pieceColor, $field);
            case 'knight': case 'n':
                return new Knight($pieceColor, $field);
            case 'pawn': case 'p':
                return new Pawn($pieceColor, $field);
            default:
                throw new \Exception('Invalid piece name. Please see documentation.');
        }
    }
}
