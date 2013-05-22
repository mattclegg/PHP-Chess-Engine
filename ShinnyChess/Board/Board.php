<?php

namespace ShinnyChess\Board;

use ShinnyChess\Board\Field;
use ShinnyChess\Pieces\Piece;

class Board 
{
    private $filledFields = array();
    
    private $capturedPieces = array();
    
    public function addPiece(Piece $piece, $position)
    {
        $this->filledFields[$position] = $piece;
    }
    
    public function getPieceAtPosition($position)
    {
        $field = new Field($position);
        
        if(isset($this->filledFields[$field->getFieldIdentifier()]))
        {
            return $this->filledFields[$field->getFieldIdentifier()];
        }
        else
        {
            return null;
        }
    }
    
    public function movePiece($currentPosition, $newPosition)
    {
        $currentField = new Field($currentPosition);
        $newField = new Field($newPosition);
        
        $currentFieldIdentifier = $currentField->getFieldIdentifier();
        if(isset($this->filledFields[$currentFieldIdentifier]))
        {
            $this->filledFields[$newField->getFieldIdentifier()] = $this->filledFields[$currentFieldIdentifier];
            unset($this->filledFields[$currentFieldIdentifier]);
        }
        else
        {
            //ex
        }
    }
    
    private function beforeMove()
    {
        
    }
    
    private function doMove()
    {
        
    }
    
    private function afterMove()
    {
        
    }
}