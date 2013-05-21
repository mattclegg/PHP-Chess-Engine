<?php

namespace ShinnyChess\Pieces;

use ShinnyChess\Pieces\King;

class PieceFactory
{
    public static function createPiece($pieceName, $pieceColor, $field)
    {
        switch ($pieceName)
        {
            case 'king': case 'k':
                return new King($pieceColor, $field);
            default:
                throw new \Exception('Invalid piece name. Please see documentation.');
        }
    }
}
