<?php namespace Craigzearfoss\ThwordUtil;

class ThwordUtil {

    const PRIMARY_SEPARATOR = '|';

    const SECONDARY_SEPARATOR = '^';

    public static function getSeparatorCharacters(){

        $separators = array(
            '|' => '|',
            '^' =>'^',
            '`' =>'`',
            "\n" => '\n',
            "\t" => '\t',
            ',' => ',',
            ';' => ';',
            ':' =>':',
            '-' =>'-',
            '\\' =>'\\',
            '/' =>'/',
            '=' =>'='
        );

        return $separators;
    }
}