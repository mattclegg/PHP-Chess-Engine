<?php

namespace ShinnyChess\Board;

class Field
{
    private $xAxisPositon;
    
    private $yAxisPositon;
    
    public function __construct($xAxisPositon = null, $yAxisPositon = null)
    {
        $this->setXAxisPositon($xAxisPositon);
        $this->setYAxisPositon($yAxisPositon);
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
    
    public static function isValidS(int $xAxisPositon, int $yAxisPositon)
    {
        return ($xAxisPositon > 0 && $xAxisPositon <= 7)
                && ($yAxisPositon > 0 && $yAxisPositon);
    }
}