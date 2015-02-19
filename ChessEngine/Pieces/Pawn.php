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

        $fields = array();
        $currentX = $this->getCurrentField()->getXAxisPosition();
        $currentY = $this->getCurrentField()->getYAxisPosition();
        
        //frontal movement
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

                $fields = $this->ValidateMove($fields, array($currentX, $currentY + $step));
            }
        } else {

            $i = 1;
            if($this->getColor() == Color::COLOR_BLACK)
            {
                $i = -$i;
            }

            $fields = $this->ValidateMove($fields, array($currentX, $currentY + $i));
        }
        
        //diagonal capturing
        if($this->getColor() == Color::COLOR_BLACK)
        {
            $step = -1;
        } else {
            $step = 1;
        }

        foreach (array(1, -1) as $xMovement)
        {
            $fields = $this->ValidateAttack($fields, array($currentX + $xMovement, $currentY + $step));
        }


        return $fields;
    }
    
    private function canMoveTwoFields()
    {
        return (($this->getColor() == Color::COLOR_WHITE && $this->getCurrentField()->getYAxisPosition() == 1)
                || ($this->getColor() == Color::COLOR_BLACK && $this->getCurrentField()->getYAxisPosition() == 6));
    }

}