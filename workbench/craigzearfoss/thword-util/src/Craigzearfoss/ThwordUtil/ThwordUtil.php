<?php namespace Craigzearfoss\ThwordUtil;

class ThwordUtil {

    const ANSWER_SEPARATOR = '|';

    public static function getSeparatorCharacters(){

        $separators = array(
            "\n" => '\n',
            "\t" => '\t',
            '|' => '|',
            ',' => ',',
            ';' => ';',
            '`' =>'`',
            ':' =>':',
            '-' =>'-',
            '\\' =>'\\',
            '/' =>'/',
            '=' =>'='
        );

        return $separators;
    }
}