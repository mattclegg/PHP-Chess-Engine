<?php

namespace ShinnyChess\Pieces;

use ShinnyChess\Pieces\Piece;
use ShinnyChess\Board\Field;
use ShinnyChess\Exceptions\FieldException;
use ShinnyChess\Game;

class Queen extends Piece
{
    
    public function move(Field $newField)
    {
        
    }

    public function getMovableFields()
    {
        $board = Game::getInstance()->getBoard();
        $fields = array();
        $currentX = $this->getCurrentField()->getXAxisPosition();
        $currentY = $this->getCurrentField()->getYAxisPosition();
        
        //fields to right
        for($i = 1; $i < 8 - $currentX; $i++)
        {
            try
            {
                $possibleField = new Field(array($currentX + $i, 
                    $currentY));
                
                $obstacleCheck = $board->getPieceAt($possibleField);
                
                if(isset($obstacleCheck) && $obstacleCheck->getColor() == $this->getColor())
                {
                    break;
                }
                else if (($obstacleCheck) && $obstacleCheck->getColor() != $this->getColor())
                {
                    $fields[] = $possibleField;
                    break;
                }
                else
                {
                    $fields[] = $possibleField;
                }
            }
            catch (FieldException $ex){}
        }
        
        //fields to left
        for($i = 1; $currentX - $i >= 0 ; $i++)
        {
            try
            {
                $possibleField = new Field(array($currentX - $i, 
                    $currentY));
                
                $obstacleCheck = $board->getPieceAt($possibleField);
                
                if(isset($obstacleCheck) && $obstacleCheck->getColor() == $this->getColor())
                {
                    break;
                }
                else if (($obstacleCheck) && $obstacleCheck->getColor() != $this->getColor())
                {
                    $fields[] = $possibleField;
                    break;
                }
                else
                {
                    $fields[] = $possibleField;
                }
            }
            catch (FieldException $ex){}
        }
        
        //fields above
        for($i = 1; $i < 8 - $currentY; $i++)
        {
            try
            {
                $possibleField = new Field(array($currentX, 
                    $currentY + $i));

                $obstacleCheck = $board->getPieceAt($possibleField);
                
                if(isset($obstacleCheck) && $obstacleCheck->getColor() == $this->getColor())
                {
                    break;
                }
                else if (($obstacleCheck) && $obstacleCheck->getColor() != $this->getColor())
                {
                    $fields[] = $possibleField;
                    break;
                }
                else
                {
                    $fields[] = $possibleField;
                }
            }
            catch (FieldException $ex){}
        }
        
        //fields beneath
        for($i = 1; $currentY - $i >= 0 ; $i++)
        {
            try
            {
                $possibleField = new Field(array($currentX, 
                    $currentY - $i));
                
                $obstacleCheck = $board->getPieceAt($possibleField);
                
                if(isset($obstacleCheck) && $obstacleCheck->getColor() == $this->getColor())
                {
                    break;
                }
                else if (($obstacleCheck) && $obstacleCheck->getColor() != $this->getColor())
                {
                    $fields[] = $possibleField;
                    break;
                }
                else
                {
                    $fields[] = $possibleField;
                }
            }
            catch (FieldException $ex){}
        }
        
        //top left fields
        for($i = 1; $currentX - $i >= 0 && $currentY + $i <= 7; $i++)
        {
            try
            {
                $possibleField = new Field(array($currentX - $i, 
                    $currentY + $i));
                
                $obstacleCheck = $board->getPieceAt($possibleField);
                
                if(isset($obstacleCheck) && $obstacleCheck->getColor() == $this->getColor())
                {
                    break;
                }
                else if (($obstacleCheck) && $obstacleCheck->getColor() != $this->getColor())
                {
                    $fields[] = $possibleField;
                    break;
                }
                else
                {
                    $fields[] = $possibleField;
                }
            }
            catch (FieldException $ex){}
        }
        
        //bottom left fields
        for($i = 1; $currentX - $i >= 0 && $currentY - $i >= 0; $i++)
        {
            try
            {
                $possibleField = new Field(array($currentX - $i, 
                    $currentY - $i));
                
                $obstacleCheck = $board->getPieceAt($possibleField);
                
                if(isset($obstacleCheck) && $obstacleCheck->getColor() == $this->getColor())
                {
                    break;
                }
                else if (($obstacleCheck) && $obstacleCheck->getColor() != $this->getColor())
                {
                    $fields[] = $possibleField;
                    break;
                }
                else
                {
                    $fields[] = $possibleField;
                }
            }
            catch (FieldException $ex){}
        }
        
        //bottom right fields
        for($i = 1; $currentX + $i <= 7 && $currentY - $i >= 0; $i++)
        {
            try
            {
                $possibleField = new Field(array($currentX + $i, 
                    $currentY - $i));
                
                $obstacleCheck = $board->getPieceAt($possibleField);
                
                if(isset($obstacleCheck) && $obstacleCheck->getColor() == $this->getColor())
                {
                    break;
                }
                else if (($obstacleCheck) && $obstacleCheck->getColor() != $this->getColor())
                {
                    $fields[] = $possibleField;
                    break;
                }
                else
                {
                    $fields[] = $possibleField;
                }
            }
            catch (FieldException $ex){}
        }
        
        //top right fields
        for($i = 1; $currentX + $i <= 7 && $currentY + $i <= 7; $i++)
        {
            try
            {
                $possibleField = new Field(array($currentX + $i, 
                    $currentY + $i));
                
                $obstacleCheck = $board->getPieceAt($possibleField);
                
                if(isset($obstacleCheck) && $obstacleCheck->getColor() == $this->getColor())
                {
                    break;
                }
                else if (($obstacleCheck) && $obstacleCheck->getColor() != $this->getColor())
                {
                    $fields[] = $possibleField;
                    break;
                }
                else
                {
                    $fields[] = $possibleField;
                }
            }
            catch (FieldException $ex){}
        }
        
        return $fields;
    }
}