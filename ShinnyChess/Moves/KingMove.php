<?php

namespace ShinnyChess\Moves;

use ShinnyChess\Moves\QueenMove;
use ShinnyChess\Board\Field;
use ShinnyChess\Exceptions\MoveException;
use ShinnyChess\Exceptions\FieldException;
use ShinnyChess\Game;
use ShinnyChess\Helpers\Color;
use ShinnyChess\Pieces\King;

class KingMove extends QueenMove
{
    public function canMove(Field $newField)
    {
        $verticalDiff = abs($this->currentField->getYAxisPosition() - $newField->getYAxisPosition());
        $horizontalDiff = abs($this->currentField->getXAxisPosition() - $newField->getXAxisPosition());
        
        if($verticalDiff > 1 || $horizontalDiff > 1)
        {
            throw new MoveException('This piece cannot move more than one field at a time');
        }
        
        return parent::canMove($newField);
    }
    
    public function getMovableTo(Field $currentField)
    {
        $board = Game::getInstance()->getBoard();
        
        $posibleFields = array();
        
        for ($i = -1; $i <= 1; $i++)
        {
            try
            {
                $newField = new Field(array($currentField->getYAxisPosition() - 1,
                    $currentField->getXAxisPosition() + $i));
                if($obstaclePiece = $board->getPieceAtPosition($newField))
                {
                    if($obstaclePiece->getColor != $this->color && !$obstaclePiece instanceof King)
                    {
                        $posibleFields[] = $newField;
                    }
                }
                else
                {
                    $posibleFields[] = $newField;
                }
            }
            catch (FieldException $ex){}
            try
            {
                $newField = new Field(array($currentField->getYAxisPosition() +1,
                    $currentField->getXAxisPosition() + $i));
                if($obstaclePiece = $board->getPieceAtPosition($newField))
                {
                    if($obstaclePiece->getColor() != $this->color && !$obstaclePiece instanceof King)
                    {
                        $posibleFields[] = $newField;
                    }
                }
                else
                {
                    $posibleFields[] = $newField;
                }
            }
            catch (FieldException $ex){}
            try
            {
                if($i != 0)
                {
                    $newField = new Field(array($currentField->getYAxisPosition(),
                        $currentField->getXAxisPosition() + $i));
                if($obstaclePiece = $board->getPieceAtPosition($newField))
                {
                    if($obstaclePiece->getColor != $this->color && !$obstaclePiece instanceof King)
                    {
                        $posibleFields[] = $newField;
                    }
                }
                else
                {
                    $posibleFields[] = $newField;
                }
                }
            }
            catch (FieldException $ex){}
        }
        
        die(print_r($posibleFields));
    }
}