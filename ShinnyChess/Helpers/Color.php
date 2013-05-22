<?php

namespace ShinnyChess\Helpers;

use ShinnyChess\StateValidator;

class Color
{
    //chess is rasistic, white is always first
    const COLOR_WHITE = 1;
    const COLOR_BLACK = 2;
    
    const STRING_WHITE = 'white';
    const STRING_WHITE_SHORT = 'w';
    
    const STRING_BLACK = 'black';
    const STRING_BLACK_SHORT = 'b';
    
    public static function getColorFromString($colorString)
    {
        if(StateValidator::isValidColor($colorString))
        {
            if($colorString == self::STRING_BLACK || $colorString == self::STRING_BLACK_SHORT)
            {
                return self::COLOR_BLACK;
            }
            else
            {
                return self::COLOR_WHITE;
            }
        }
        else
        {
            //ex
        }
    }
}