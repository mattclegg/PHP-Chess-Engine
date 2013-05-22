<?php

namespace ShinnyChess\Parsers;

abstract class ParserValidator
{
    abstract public static function isValidState($state);
}