<?php

namespace ChessEngine\Pieces;

use ChessEngine\Board\Field;
use ChessEngine\Exceptions\FieldException;
use ChessEngine\Game;

class Knight extends Piece
{

    public function getMovableFields()
    {
        $possibleMoves = array(
            -1, 1, 2, -2
        );
        $board = Game::getInstance()->getBoard();
        $fields = array();
        $currentX = $this->getCurrentField()->getXAxisPosition();
        $currentY = $this->getCurrentField()->getYAxisPosition();

        foreach ($possibleMoves as $xMove)
        {
            foreach (abs($xMove) == 2 ? array(1, -1) : array(2, -2) as $yMove)
            {
                try
                {
                    $possibleField = new Field(array($currentX + $xMove, $currentY + $yMove));

                    $obstacleCheck = $board->getPieceAt($possibleField);

                    if($obstacleCheck && $obstacleCheck->getColor() == $this->getColor())
                    {
                        break;
                    }
                    else if ($obstacleCheck && $obstacleCheck->getColor() != $this->getColor())
                    {
                        $fields[] = $possibleField;
                        break;
                    }
                    else
                    {
                        $fields[] = $possibleField;
                    }
                }
                catch (FieldException $ex) {}
            }
        }

        return $fields;
    }

    public function move(Field $newField)
    {
        
    }

}