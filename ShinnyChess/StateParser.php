<?php

namespace ShinnyChess;

use ShinnyChess\Pieces\Piece;
use ShinnyChess\Pieces\PieceFactory;
use ShinnyChess\Board\Field;
use ShinnyChess\Exceptions\InvalidGameStateException;
use ShinnyChess\Helpers\Color;

class StateParser
{
    private $validator;
    private $piecesArray;
    
    public function __construct()
    {
        $this->validator = new StateValidator;
    }
    
    public function getPieces($gameRepresentation)
    {
        return $this->piecesArray;
//        return $this->toArray($gameRepresentation);
    }
    
    private function toArray($gameRepresentation)
    {
        if($arrayRepresentation = $this->validator->isValidJson($gameRepresentation, true))
        {
            return $this->generatePiecesFromArray($arrayRepresentation);
        }
        else if($this->validator->isValidFen($gameRepresentation))
        {
            return $this->toArrayFromFen($gameRepresentation);
        }
        else
        {
            throw new InvalidGameStateException;
        }
    }
    
    private function generatePiecesFromArray($arrayRepresentation)
    {
        $pieces = array();
        
        foreach ($arrayRepresentation as $piece)
        {
            if($this->validator->isValidArrayPiece($piece))
            {
                $color = Color::getColorFromString($piece['color']);
                
                $field = new Field($piece['position']);
                
                $pieces[$field->getFieldIdentifier()] = PieceFactory::createPiece($piece['piece'], $color, $field);
            }
            else
            {
                //exception
            }
        }
        return $pieces;
    }
}