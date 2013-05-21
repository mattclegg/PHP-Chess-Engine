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
        }
    }
}
