<?php namespace Craigzearfoss\ThwordUtil;

class ThwordUtil {

    const PRIMARY_SEPARATOR = '|';

    const SECONDARY_SEPARATOR = '^';

    const DEFAULT_MAX_CHOICES = 4;

    public static function getSeparatorCharacters() {

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

    public static function getMaxChoicesList() {

        $maxChoices = array();
        for ($i=2; $i<11; $i++) {
            $maxChoices[$i] = $i;
        }

        return $maxChoices;
    }
}