<?php

namespace ChessEngine\Pieces;

use ChessEngine\Board\Field;
use ChessEngine\Exceptions\FieldException;
use ChessEngine\Game;
use ChessEngine\Helpers\Color;

class Pawn extends Piece
{

    public function move(Field $newField)
    {
        
    }

    public function getMovableFields()
    {
        //add en passant
        
        $board = Game::getInstance()->getBoard();
        $fields = array();
        $currentX = $this->getCurrentField()->getXAxisPosition();
        $currentY = $this->getCurrentField()->getYAxisPosition();
        
        //frontal movement
        try
        {
            if($this->canMoveTwoFields())
            {
                for($i = 1; $i < 3; $i++)
                {
                    if($this->getColor() == Color::COLOR_BLACK)
                    {
                        $step = -$i;
                    }
                    else
                    {
                        $step = $i;
                    }
                    
                    $possibleField = new Field(array($currentX, $currentY + $step));
                
                    $obstacleCheck = $board->getPieceAt($possibleField);
                    
                    if(isset($obstacleCheck))
                    {
                        break;
                    }
                    else
                    {
                        $fields[] = $possibleField;
                    }
                }
            }
            else
            {
                $i = 1;
                if($this->getColor() == Color::COLOR_BLACK)
                {
                    $i = -$i;
                }
                $possibleField = new Field(array($currentX, $currentY + $i));
                
                $obstacleCheck = $board->getPieceAt($possibleField);

                if(!isset($obstacleCheck))
                {
                    $fields[] = $possibleField;
                }
            }
        }
        catch (FieldException $ex){}
        
        //diagonal capturing
        try
        {
            if($this->getColor() == Color::COLOR_BLACK)
            {
                $step = -1;
            }
            else
            {
                $step = 1;
            }
            
            foreach (array(1, -1) as $xMovement)
            {
                $possibleField = new Field(array($currentX + $xMovement, $currentY + $step));

                $obstacleCheck = $board->getPieceAt($possibleField);

                if(isset($obstacleCheck) && $obstacleCheck->getColor() != $this->getColor())
                {
                    $fields[] = $possibleField;
                }
            }
        }
        catch (FieldException $ex){}

        return $fields;
    }
    
    private function canMoveTwoFields()
    {
        return (($this->getColor() == Color::COLOR_WHITE && $this->getCurrentField()->getYAxisPosition() == 1)
                || ($this->getColor() == Color::COLOR_BLACK && $this->getCurrentField()->getYAxisPosition() == 6));
    }

}