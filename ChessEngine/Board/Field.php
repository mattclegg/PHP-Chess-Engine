<?php

namespace ChessEngine\Board;

use ChessEngine\StateValidator;
use ChessEngine\Exceptions\FieldException;

class Field
{
    private $xAxisPositon;
    
    private $yAxisPositon;
    
    public function __construct($boardPosition)
    {
        if($boardPosition instanceof self)
        {
            $this->xAxisPositon = $boardPosition->getXAxisPosition();
            $this->yAxisPositon = $boardPosition->getYAxisPosition();
        }
        else if(is_array($boardPosition) && StateValidator::isValidFieldArray($boardPosition))
        {
            $this->setXAxisPosition($boardPosition[0]);
            $this->setYAxisPosition($boardPosition[1]);
        }
        else if(!is_array($boardPosition) && StateValidator::isValidAlgebraicNotation($boardPosition))
        {
            $matrixPositions = $this->getMatrixPositionFromAlgebraicNotation($boardPosition);
            
            $this->setXAxisPosition($matrixPositions[0]);
            $this->setYAxisPosition($matrixPositions[1]);
        }
        else
        {
            throw new FieldException(FieldException::TYPE_INVALID_PARAMS);
        }
    }
    
    public function setXAxisPosition($xAxisPosition)
    {
        $this->xAxisPositon = $xAxisPosition;
    }
    
    public function setYAxisPosition($yAxisPosition)
    {
        $this->yAxisPositon = $yAxisPosition;
    }
    
    public function getXAxisPosition()
    {
        return $this->xAxisPositon;
    }
    
    public function getYAxisPosition()
    {
        return $this->yAxisPositon;
    }
    
    public function isValid()
    {
        return ($this->getXAxisPosition() > 0 && $this->getXAxisPosition() <= 7)
                && ($this->getYAxisPosition() > 0 && $this->getYAxisPosition() <= 7);
    }
    
    public function getFieldIdentifier()
    {
        return $this->getXAxisPosition() . 'x' . $this->getYAxisPosition();
    }
    
    private function getMatrixPositionFromAlgebraicNotation($string)
    {
        return array($this->letterToMatrixPosition($string[0]), (int) $string[1] - 1);
    }
    
    private function letterToMatrixPosition($letter)
    {
        $position = false;
        
        switch ($letter)
        {
            case 'a':
                $position = 0;
                break;
            case 'b':
                $position = 1;
                break;
            case 'c':
                $position = 2;
                break;
            case 'd':
                $position = 3;
                break;
            case 'e':
                $position = 4;
                break;
            case 'f':
                $position = 5;
                break;
            case 'g':
                $position = 6;
                break;
            case 'h':
                $position = 7;
                break;
        }
        
        return $position;
    }
    
    private function matrixPositionToLetter($position)
    {
        $letter = false;
        
        switch ($position)
        {
            case 0:
                $position = 'a';
                break;
            case 1:
                $position = 'b';
                break;
            case 2:
                $position = 'c';
                break;
            case 3:
                $position = 'd';
                break;
            case 4:
                $position = 'e';
                break;
            case 5:
                $position = 'f';
                break;
            case 6:
                $position = 'g';
                break;
            case 7:
                $position = 'h';
                break;
        }
        
        return $position;
    }
    
    public function toArray()
    {
        return array($this->getXAxisPosition(), $this->getYAxisPosition());
    }
    
    public function toAlgebraicNotation()
    {
        $notation = '';
        
        $notation .= $this->matrixPositionToLetter($this->getXAxisPosition());
        $notation .= (string) $this->getYAxisPosition() + 1;
        
        return $notation;
    }
}