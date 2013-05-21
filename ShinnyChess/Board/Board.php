<?php

namespace ShinnyChess\Board;

use ShinnyChess\Board\Field;
use ShinnyChess\Pieces\Piece;

class Board 
{
    private $filledFields = array();
    
    private $capturedPieces = array();
    
    public function addPiece(Piece $piece)
    {
        $this->filledFields[$piece->getCurrentField()->getFieldIdentifier()] = $piece;
    }
    
    public function getPieceAtPosition($position)
    {
        $field = new Field($position);
        
        return $this->filledFields[$field->getFieldIdentifier()];
    }
    
    public function movePiece(Field $currentField, Field $newField)
    {
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
}