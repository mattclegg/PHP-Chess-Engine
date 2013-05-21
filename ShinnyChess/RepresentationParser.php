<?php

namespace ShinnyChess;

use ShinnyChess\RepresentationValidator;
use ShinnyChess\Pieces\Piece;
use ShinnyChess\Pieces\PieceFactory;
use ShinnyChess\Board\Field;
use ShinnyChess\Exceptions\InvalidGameRepresentationException;
use ShinnyChess\Helpers\Color;

class RepresentationParser
{
    private $validator;
    
    public function __construct()
    {
        $this->validator = new RepresentationValidator;
    }
    
    public function getPieces($gameRepresentation)
    {
        return $this->toArray($gameRepresentation);
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
            throw new InvalidGameRepresentationException;
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
                
                $x = new Field($piece['position']);
                
                $pieces[] = PieceFactory::createPiece($piece['piece'], $color, 
                        new Field($piece['position']));
            }
            else
            {
                //exception
            }
        }
        return $pieces;
    }
}