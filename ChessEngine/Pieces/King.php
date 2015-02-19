<?php

namespace ChessEngine\Pieces;

use ChessEngine\Board\Field;
use ChessEngine\Exceptions\FieldException;
use ChessEngine\Game;
use ChessEngine\States\StateValidator;

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
            $fields = $this->ValidateMove($fields, array($currentX + $i, $currentY - 1));
            $fields = $this->ValidateMove($fields, array($currentX + $i, $currentY + 1));

            //fields in same y coordinate
            if($i != 0)
            {
                $fields = $this->ValidateMove($fields, array($currentX + $i, $currentY));
            }

        }

        return $fields;
    }

}