<?php

namespace ShinnyChess\Helpers;

use ShinnyChess\Board\Field;

class JsonState
{
    const CASTLING_KINGS = 1;
    const CASTLING_QUEENS = 2;
    const CASTLING_BOTH = 3;
    
    private $pieces = array();
    
    private $nextPlayer = 'w';
    
    private $whiteCastling;
    
    private $blackCastling;
    
    private $enPassantField = null;
    
    private $halfMoves = 0;
    
    private $fullMoves = 1;
    
    public function addPiece()
    {
        
    }
    
    public function setNextPlayer($player)
    {
        if(strtolower($player) == 'black' || strtolower($player) == 'b')
        {
            $this->nextPlayer = 'b';
        }
    }
    
    public function setWhiteCastling($castling)
    {
        if(in_array($castling, array(self::CASTLING_BOTH, self::CASTLING_KINGS, self::CASTLING_QUEENS)))
        {
            $this->whiteCastling = $castling;
        }
    }
    
    public function setBlackCastling()
    {
        if(in_array($castling, array(self::CASTLING_BOTH, self::CASTLING_KINGS, self::CASTLING_QUEENS)))
        {
            $this->blackCastling = $castling;
        }
    }
    
    public function setEnPassantField($position)
    {
        $field = new Field($position);
        $this->enPassantField = $field->toAlgebriacNotation();
    }
    
    public function setHalfMoves($halfMoves)
    {
        $this->halfMoves = (int)$halfMoves;
    }
    
    public function setFullMoves($fullMoves)
    {
        $this->halfMoves = (int)$fullMoves;
    }
    
    private function getCastlingString()
    {
        if($this->whiteCastling == null && $this->blackCastling == null)
        {
            return '-';
        }
        else
        {
            $castlingArray = array();
            if($this->whiteCastling == self::CASTLING_KINGS)
            {
                $castlingArray[] = 'K';
            }
            else if($this->whiteCastling == self::CASTLING_QUEENS)
            {
                $castlingArray[] = 'Q';
            }
            else
            {
                $castlingArray[] = 'K';
                $castlingArray[] = 'Q';
            }
            
            if($this->blackCastling == self::CASTLING_KINGS)
            {
                $castlingArray[] = 'k';
            }
            else if($this->blackCastling == self::CASTLING_QUEENS)
            {
                $castlingArray[] = 'q';
            }
            else
            {
                $castlingArray[] = 'k';
                $castlingArray[] = 'q';
            }
        }
    }

    public function getJson()
    {
        return json_encode(array(
            $this->pieces,
            $this->nextPlayer,
            $this->getCastlingString(),
            $this->enPassantField,
            $this->halfMoves,
            $this->fullMoves
        ));
    }
}