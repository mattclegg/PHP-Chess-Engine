<?php

namespace ShinnyChess\Parsers;

use ShinnyChess\Exceptions\InvalidGameStateException;

class ParserFactory
{
    private static $decodedJson;
    
    public static function createParser($state)
    {
        if(self::isJson($state))
        {
            return new JsonParser($decodedJson);
        }
        else if(self::isFen($state))
        {
            return new FenParser($state);
        }
        else
        {
            throw new InvalidGameStateException();
        }
    }
    
    private static function isFen($state)
    {
        return preg_match('/^([rnbqkbnrp1-8]{1,8}\/){7}[rnbqkbnrp1-8]{1,8} [wb] [kq-]{1,4} [-abcdefgh1-8]{1,2} \d+ \d+$/i', $state);
    }
    
    private static function isJson($state)
    {
        $decodedJson = json_decode($state, true);
        
        $valid = json_last_error() == JSON_ERROR_NONE;
        if($valid)
        {
            //avoiding double decoding
            self::$decodedJson = $decodedJson;
        }
        
        return $valid;
    }
}