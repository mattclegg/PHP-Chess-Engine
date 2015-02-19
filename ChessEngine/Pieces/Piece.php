<?php

namespace ChessEngine\Pieces;

use ChessEngine\Board\Field;
use ChessEngine\Exceptions\InvalidPieceNameException;
use ChessEngine\States\StateValidator;
use ChessEngine\Game;

abstract class Piece
{
    protected $captured = false;
    
    protected $color;
    
    protected $currentField;

    public function __construct($color, Field $currentField)
    {
        $this->color = $color;
        $this->currentField = $currentField;
        
        if($currentField == null)
        {
            $this->captured = true;
        }
    }
    
    public function isCaptured()
    {
        return $this->captured;
    }
    
    public function getColor()
    {
        return $this->color;
    }
    
    public function getCurrentField()
    {
        return $this->currentField;
    }
    
    public abstract function move(Field $newField);
    
    public abstract function getMovableFields();

    public function isValidMove(array $array) {
        return StateValidator::isValidFieldArray($array);
    }



    //moves
    public function isDiagonalMove(Field $newField)
    {
        return ($this->currentField->getXAxisPosition() - $newField->getXAxisPosition())
                == ($this->currentField->getYAxisPosition() - $newField->getYAxisPosition());
    }
    
    public function isVerticalMove(Field $newField)
    {
        return ($this->currentField->getXAxisPosition() == $newField->getXAxisPosition()) && 
                ($this->currentField->getYAxisPosition() != $newField->getYAxisPosition());
    }
    
    public function isHorizontalMove(Field $newField)
    {
        return ($this->currentField->getXAxisPosition() != $newField->getXAxisPosition()) && 
                ($this->currentField->getYAxisPosition() == $newField->getYAxisPosition());
    }
    
    public function isLMove(Field $newField)
    {
        $verticalDiff = abs($this->currentField->getYAxisPosition() - $newField->getYAxisPosition());
        $horizontalDiff = abs($this->currentField->getXAxisPosition() - $newField->getXAxisPosition());
        
        return ($verticalDiff == 1 && $horizontalDiff == 2) || ($horizontalDiff == 1 && $verticalDiff == 2);
    }
    
    public function isEnPassantMove()
    {
        
    }
    
    public function updateField(Field $newField)
    {
        $this->currentField = $newField;
    }
    
    public static function validateName($name)
    {
        $name = strtolower($name);
        
        if(!in_array($name, array('p', 'pawn', 'r', 'rook', 'n', 'knight', 'b', 'bishop', 'q', 'queen', 'k', 'king')))
        {
            throw new InvalidPieceNameException;
        }
    }


    public function ValidateMove($fields, $proposedMove) {
        if($this->isValidMove($proposedMove)) {
            $possibleField = new Field($proposedMove);

            $board = Game::getInstance()->getBoard();

            if(!$board->getPieceAt($possibleField)) {
                $fields[] = $possibleField->toAlgebraicNotation();
            } else {
                $fields = $this->ValidateAttack($fields, $proposedMove);
            }
        }
        return $fields;
    }

    public function ValidateAttack($fields, $proposedMove) {
        if($this->isValidMove($proposedMove)) {
            $possibleField = new Field($proposedMove);

            $board = Game::getInstance()->getBoard();

            $attackPiece = $board->getPieceAt($possibleField);

            if($attackPiece && $this->getColor() != $attackPiece->getColor()) {
                $fields[] = $possibleField->toAlgebraicNotation();
            }
        }
        return $fields;
    }
}