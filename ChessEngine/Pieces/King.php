<?php

namespace ChessEngine\Pieces;

use ChessEngine\Board\Field;
use ChessEngine\Exceptions\FieldException;
use ChessEngine\Game;

class King extends Piece
{

    public function isAttacked()
    {
        
    }

    public function move(Field $newField)
    {
        
    }

    public function getMovableFields()
    {
        $board = Game::getInstance()->getBoard();
        $fields = array();
        $currentX = $this->getCurrentField()->getXAxisPosition();
        $currentY = $this->getCurrentField()->getYAxisPosition();



        for ($i = -1; $i <= 1; $i++)
        {

            var_dump($currentY - 1);

            //fields beneath
            $possibleField = new Field(array($currentX + $i, $currentY - 1));


            $obstacleCheck = $board->getPieceAt($possibleField);

            if($obstacleCheck && $obstacleCheck->getColor() != $this->getColor())
            {
                $fields[] = $possibleField;
            }

            //fields above
            $possibleField = new Field(array($currentX + $i, $currentY + 1));

            $obstacleCheck = $board->getPieceAt($possibleField);

            if($obstacleCheck && $obstacleCheck->getColor() != $this->getColor())
            {
                $fields[] = $possibleField;
            }

            //fields in same y coordinate
            if($i != 0)
            {
                $possibleField = new Field(array($currentX + $i, $currentY));

                $obstacleCheck = $board->getPieceAt($possibleField);

                if($obstacleCheck && $obstacleCheck->getColor() != $this->getColor())
                {
                    $fields[] = $possibleField;
                }
            }

        }

        return $fields;
    }

}