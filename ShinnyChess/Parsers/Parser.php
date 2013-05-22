<?php

namespace ShinnyChess\Parsers;

abstract class Parser
{
    protected $piecesArray = array();
    
    protected $initialState;
    
    public function getPieces()
    {
        return $this->piecesArray;
    }
    
    protected abstract function convertToArray();
    
    protected abstract function generatePiecesFromArray();
    
    protected abstract function checkValidity();

    public function parse()
    {
        $this->checkValidity();
        $this->convertToArray();
        $this->generatePiecesFromArray();
    }
}