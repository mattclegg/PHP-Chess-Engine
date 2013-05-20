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
    
    public function getXAxisPositon()
    {
        return $this->xAxisPositon;
    }
    
    public function getYAxisPositon()
    {
        return $this->yAxisPositon;
    }
    
    public function isValid()
    {
        return ($this->getXAxisPositon() > 0 && $this->getXAxisPositon() <= 7)
                && ($this->getYAxisPositon() > 0 && $this->getYAxisPositon() <= 7);
    }
    
    public static function isValidS(int $xAxisPositon, int $yAxisPositon)
    {
        return ($xAxisPositon > 0 && $xAxisPositon <= 7)
                && ($yAxisPositon > 0 && $yAxisPositon);
    }
}