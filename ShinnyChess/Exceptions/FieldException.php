<?php

namespace ShinnyChess\Exceptions;

use \Exception;

class FieldException extends \Exception
{
    const TYPE_X_AXIS_OUTBOUND = 1;
    const TYPE_Y_AXIS_OUTBOUND = 2;
    const TYPE_INVALID_PARAMS = 3;
    
    protected static $messageXAxisOutbound = 'X position has to be between "0" and "7" or from "a" to "h".';
    protected static $messageYAxisOutbound = 'Y position has to be between "0" and "7" or from "a" to "h".';
    protected static $messageInvalidParams = 'Invalid param passed to Field constructor. Parameter
        has to be algebriac notation (eg. "a1") or an array with 2 integer values from 0 to 7.';
    
    public function __construct($type)
    {
        $message = '';
        switch ($type)
        {
            case self::TYPE_X_AXIS_OUTBOUND:
                $message = self::$messageXAxisOutbound;
                break;
            case self::TYPE_Y_AXIS_OUTBOUND:
                $message = self::$messageYAxisOutbound;
                break;
            case self::TYPE_INVALID_PARAMS:
                $message = self::$messageInvalidParams;
                break;
        }
        
        parent::__construct($message);
    }
}