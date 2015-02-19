<?php

namespace ChessEngine;

use ChessEngine\Helpers\Color;

class StateValidator
{
    private $validDecodedJson;

    private $validPieceNames = array('knight', 'king', 'queen', 'rook', 'bishop', 'pawn');
    private $validPieceNamesShort = array('n', 'k', 'q', 'r', 'b', 'p');

    private static $validColorNames = array(Color::STRING_BLACK, Color::STRING_WHITE);
    private static $validColorNamesShort = array(Color::STRING_BLACK_SHORT, Color::STRING_WHITE_SHORT);

    private static $validAlgebriacNotationLetters = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h');

    public function isValidJson($gameRepresentation, $returnDecodedJson = false)
    {
        $arrayRepresentation = json_decode($gameRepresentation, true);

        $valid = json_last_error() == JSON_ERROR_NONE;
        if($valid)
        {
            $this->validDecodedJson = $arrayRepresentation;
        }

        if($returnDecodedJson)
        {
            return $this->validDecodedJson;
        }
        else
        {
            return $valid;
        }
    }

    public function isValidFen($gameRepresentation)
    {
        return false;
    }

    public function isValidArrayPiece(array $piece)
    {
        $valid = true;

        if(isset($piece['piece'], $piece['color'], $piece['field']))
        {
            $pieceName = strtolower($piece['piece']);
        }
        else
        {

        }

        return $valid;
    }

    public static function isValidColor($colorString)
    {
        return in_array($colorString, self::$validColorNames) || in_array($colorString, self::$validColorNamesShort);
    }

    public static function isValidAlgebraicNotation($string)
    {
        return strlen($string) == 2 && in_array($string[0], self::$validAlgebriacNotationLetters)
        && (int) $string[1] >= 1 && (int) $string[1] <= 8;
    }

    public static function isValidFieldArray($array)
    {
        return count($array) == 2 && $array[0] >= 0 && $array[0] <= 7
        && $array[1] >= 0 && $array[1] <= 7;
    }
}