<?php

namespace ShinnyChess\Board;

use ShinnyChess\RepresentationValidator;
use ShinnyChess\Exceptions\FieldException;

class Field
{
    private $xAxisPositon;
    
    private $yAxisPositon;
    
    public function __construct($boardPosition)
    {
        if(is_array($boardPosition) && RepresentationValidator::isValidFieldArray($boardPosition))
        {
            $this->setXAxisPositon($boardPosition[0]);
            $this->setYAxisPositon($boardPosition[1]);
        }
        else if(!is_array($boardPosition) && RepresentationValidator::isValidAlgebraicNotation($boardPosition))
        {
            $matrixPositions = $this->getMatrixPositionFromAlgebriacNotation($boardPosition);
            
            $this->setXAxisPositon($matrixPositions[0]);
            $this->setYAxisPositon($matrixPositions[1]);
        }
        else
        {
            throw new FieldException(FieldException::TYPE_INVALID_PARAMS);
        }
    }
    
    public function setXAxisPositon($xAxisPosition)
    {
        $this->xAxisPositon = $xAxisPosition;
    }
    
    public function setYAxisPositon($yAxisPosition)
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
    
    public static function isValidStatic($xAxisPositon, $yAxisPositon)
    {
        return ($xAxisPositon > 0 && $xAxisPositon <= 7)
                && ($yAxisPositon > 0 && $yAxisPositon);
    }
    
    public function getFieldIdentifier()
    {
        return $this->getXAxisPosition() . 'x' . $this->getYAxisPosition();
    }
    
    private function getMatrixPositionFromAlgebriacNotation($string)
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
}