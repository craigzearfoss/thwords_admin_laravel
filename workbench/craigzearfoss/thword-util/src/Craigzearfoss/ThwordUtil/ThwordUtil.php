<?php namespace Craigzearfoss\ThwordUtil;

class ThwordUtil {

    public static function getSeparatorCharacters(){

        $separators = array(
            "\n" => '\n',
            '|' => '|',
            ',' => ',',
            ';' => ';',
            '`' =>'`'
        );

        return $separators;
    }
}