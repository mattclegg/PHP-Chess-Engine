<?php

namespace ChessEngine\Board;

use ChessEngine\Pieces\Piece;

class Board 
{
    private $filledFields = array();
    
    private $capturedPieces = array();
    
    private $enPassantField;

    public function __set($position, Piece $piece)
    {
        $this->filledFields[$position] = $piece;
    }

    /**
     * @param $position
     * @return Peice | bool
     */
    public function __get($position)
    {
        if (array_key_exists($position, $this->filledFields)) {
            return $this->filledFields[$position];
        }
        return false;
    }
    
    public function addPiece(Piece $piece, $position)
    {
        $this->$position = $piece;
    }
    
    public function getPieceAt($position)
    {
        return $this->$position;
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
    
    public function updatePieceField(Field $oldField, Field $newField)
    {
        $oldFieldIdentifier = $oldField->getFieldIdentifier();
        if(isset($this->filledFields[$oldFieldIdentifier]))
        {
            $this->filledFields[$newField->getFieldIdentifier()] = $this->filledFields[$oldFieldIdentifier];
            $this->filledFields[$newField->getFieldIdentifier()]->updateField($newField);
            unset($this->filledFields[$oldFieldIdentifier]);
        }
        else
        {
            //ex
        }
    }
    
    public function getAllPieces()
    {
        return $this->filledFields;
    }
    
    public function setEnPassantField($position)
    {
        $this->enPassantField = new Field($position);
    }
    
    public function getEnPassantField()
    {
        return $this->enPassantField;
    }
}