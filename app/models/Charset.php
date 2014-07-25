<?php

use LaravelBook\Ardent\Ardent;

class Charset extends Ardent {

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array();

    protected $fillable = [];

    protected $guarded = array('id');


    /**
     * Ardent validation rules
     */
    public static $rules = array(
    );

    protected $charSets = array(
        'de' => array(
            'upper' => array(
                'chars' => 'AÄBCDEFGHIJKLMNOÖPQRSßTUÜVWXYZ',
                'tiles' => 'AÄBCDEFGHIJKLMNOÖPQRSßTUÜVWXYZ'
            ),
            'lower' => array(
                'chars' => 'aäbcdefghijklmnoöpqrsßtuüvwxyz',
                'tiles' => 'aäbcdefghijklmnoöpqrsßtuüvwxyz'
            ),
        ),
        'dk' => array(
            'upper' => array(
                'chars' => 'AÂBCDEÈÉÊFGHIJKLMNOÒÓÔPQRSTUVWXYZÆØÅ',
                'tiles' => 'AÂBCDEÈÉÊFGHIJKLMNOÒÓÔPQRSTUVWXYZÆØÅ'
            ),
            'lower' => array(
                'chars' => 'aâbcdeèéêfghijklmnoòóôpqrstuvwxyzæøå',
                'tiles' => 'aâbcdeèéêfghijklmnoòóôpqrstuvwxyzæøå'
            ),
        ),
        'en' => array(
            'upper' => array(
                'chars' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
                'tiles' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            ),
            'lower' => array(
                'chars' => 'abcdefghijklmnopqrstuvwxyz',
                'tiles' => 'abcdefghijklmnopqrstuvwxyz'
            ),
        ),
        'es' => array(
            'upper' => array(
                'chars' => 'AÁBCDEÉFGHIÍJKLMNÑOÓPQRSTUÚÜVWXYZ',
                'tiles' => 'AÁBCDEÉFGHIÍJKLMNÑOÓPQRSTUÚÜVWXYZ'
            ),
            'lower' => array(
                'chars' => 'aábcdeéfghiíjklmnñoópqrstuúüvwxyz',
                'tiles' => 'abcdefghijklmnopqrstuvwxyz'
            ),
        ),
        'fi' => array(
            'upper' => array(
                'chars' => 'ABCDEFGHIJKLMNOPQRSTUVXYZÅÄÖ',
                'tiles' => 'ABCDEFGHIJKLMNOPQRSTUVXYZÅÄÖ'
            ),
            'lower' => array(
                'chars' => 'abcdefghijklmnopqrstuvxyzåäö',
                'tiles' => 'abcdefghijklmnopqrstuvxyzåäö'
            ),
        ),
        'fr' => array(
            'upper' => array(
                'chars' => 'AÀÂÆBCÇDEÈÉÊËFGHIÎÏJKLMNOÔŒPQRSTUÙÛÜVWXYŸZ',
                'tiles' => 'AÀÂÆBCÇDEÈÉÊËFGHIÎÏJKLMNOÔŒPQRSTUÙÛÜVWXYŸZ'
            ),
            'lower' => array(
                'chars' => 'aàâæbcçdeèéêëfghiîïjklmnoôœpqrstuùûüvwxyÿz',
                'tiles' => 'aàâæbcçdeèéêëfghiîïjklmnoôœpqrstuùûüvwxyÿz'
            ),
        ),
        'gk' => array(
            'upper' => array(
                'chars' => 'ΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩ',
                'tiles' => 'ΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩ'
            ),
            'lower' => array(
                'chars' => 'αβγδεζηθικλμνξοπρστυφχψω',
                'tiles' => 'αβγδεζηθικλμνξοπρστυφχψω'
            ),
        ),
        'he' => array(
            'upper' => array(
                'chars' => 'אבגדהוזחטיכךלמםנןסעפףצץקרשת',
                'tiles' => 'אבגדהוזחטיכךלמםנןסעפףצץקרשת'
            ),
            'lower' => array(
                'chars' => 'אבגדהוזחטיכךלמםנןסעפףצץקרשתּ',
                'tiles' => 'אבגדהוזחטיכךלמםנןסעפףצץקרשתּ'
            ),
        ),
        'ic' => array(  // icelandic
            'upper' => array(
                'chars' => 'AÁBDÐEÉFGHIÍJKLMNOÓPRSTUÚVXYÝÞÆÖ',
                'tiles' => 'AÁBDÐEÉFGHIÍJKLMNOÓPRSTUÚVXYÝÞÆÖ'
            ),
            'lower' => array(
                'chars' => 'aábdðeéfghiíjklmnoóprstuúvxyýþæö',
                'tiles' => 'aábdðeéfghiíjklmnoóprstuúvxyýþæö'
            ),
        ),
        'it' => array(
            'upper' => array(
                'chars' => 'AÀBCDEÈÉFGHIÌÍÎLMNOÒÓPQRSTUÙVZ',
                'tiles' => 'AÀBCDEÈÉFGHIÌÍÎLMNOÒÓPQRSTUÙVZ'
            ),
            'lower' => array(
                'chars' => 'aàbcdeèéfghiìíîlmnoòópqrstuùvz',
                'tiles' => 'aàbcdeèéfghiìíîlmnoòópqrstuùvz'
            ),
        ),
        'la' => array(  // latin (roman)
            'upper' => array(
                'chars' => 'ABCDEFGHIKLMNOPQRSTVXYZ',
                'tiles' => 'ABCDEFGHIKLMNOPQRSTVXYZ'
            ),
            'lower' => array(
                'chars' => 'abcdefghiklmnopqrstvxyz',
                'tiles' => 'abcdefghiklmnopqrstvxyz'
            ),
        ),
        'nl' => array(
            'upper' => array(
                'chars' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
                'tiles' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            ),
            'lower' => array(
                'chars' => 'abcdefghijklmnopqrstuvwxyz',
                'tiles' => 'abcdefghijklmnopqrstuvwxyz'
            ),
        ),
        'no' => array(
            'upper' => array(
                'chars' => 'AÂBCDEÈÉÊFGHIJKLMNOÒÓÔPQRSTUVWXYZÆØÅ',
                'tiles' => 'AÂBCDEÈÉÊFGHIJKLMNOÒÓÔPQRSTUVWXYZÆØÅ'
            ),
            'lower' => array(
                'chars' => 'aâbcdeèéêfghijklmnoòóôpqrstuvwxyzæøå',
                'tiles' => 'aâbcdeèéêfghijklmnoòóôpqrstuvwxyzæøå'
            ),
        ),
        'pl' => array(
            'upper' => array(
                'chars' => 'AĄBCĆDEĘFGHIJKLŁMNŃOÓPQRSŚTUVWXYŹŻ',
                'tiles' => 'AĄBCĆDEĘFGHIJKLŁMNŃOÓPQRSŚTUVWXYŹŻ'
            ),
            'lower' => array(
                'chars' => 'aąbcćdeęfghijklłmnńoópqrsśtuvwxyźż',
                'tiles' => 'aąbcćdeęfghijklłmnńoópqrsśtuvwxyźż'
            ),
        ),
        'po' => array(
            'upper' => array(
                'chars' => 'AÀÁÂÃBCÇDEÉÊFGHIÍJKLMNOÓÔÕPQRSTUÚÜVWXYZ',
                'tiles' => 'AÀÁÂÃBCÇDEÉÊFGHIÍJKLMNOÓÔÕPQRSTUÚÜVWXYZ'
            ),
            'lower' => array(
                'chars' => 'aàáâãbcçdeéêfghiíjklmnoóôõpqrstuúüvwxyz',
                'tiles' => 'aàáâãbcçdeéêfghiíjklmnoóôõpqrstuúüvwxyz'
            ),
        ),
        'ru' => array(
            'upper' => array(
                'chars' => 'АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ',
                'tiles' => 'АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ'
            ),
            'lower' => array(
                'chars' => 'абвгдеёжзийклмнопрстуфхцчшщъыьэюя',
                'tiles' => 'абвгдеёжзийклмнопрстуфхцчшщъыьэюя'
            ),
        ),
        'sv' => array(
            'upper' => array(
                'chars' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZÅÄÖ',
                'tiles' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZÅÄÖ'
            ),
            'lower' => array(
                'chars' => 'abcdefghijklmnopqrstuvwxyzåäö',
                'tiles' => 'abcdefghijklmnopqrstuvwxyzåäö'
            )
        )
    );

    protected $charValues = array(
        'A' => 1,
        'B' => 3,
        'C' => 3,
        'D' => 2,
        'E' => 1,
        'F' => 4,
        'G' => 2,
        'H' => 4,
        'I' => 1,
        'J' => 8,
        'K' => 5,
        'L' => 1,
        'M' => 3,
        'N' => 1,
        'O' => 1,
        'P' => 3,
        'Q' => 10,
        'R' => 1,
        'S' => 1,
        'T' => 1,
        'U' => 1,
        'V' => 4,
        'W' => 4,
        'X' => 4,
        'Y' => 5,
        'Z' => 10,
        ' ' => 1,
        '-' => 3,
        '\'' => 5,
        '0' => 5,
        '1' => 5,
        '2' => 5,
        '3' => 5,
        '4' => 5,
        '5' => 5,
        '6' => 5,
        '7' => 5,
        '8' => 5,
        '9' => 5
    );

    public function getCharsLower($code = 'en') {

        $code = strtolower($code);

        if (isset($this->charSets[$code])) {
            $charset = self::mb_str_to_array($this->charSets[$code]['lower']['chars']);
        } else {
            $charset = array();
        }

        return $charset;
    }

    public function getCharsUpper($code = 'en') {

        $code = strtolower($code);

        if (isset($this->charSets[$code])) {
            $charset = self::mb_str_to_array($this->charSets[$code]['upper']['chars']);
        } else {
            $charset = array();
        }

        return $charset;
    }

    public function getCharset($code = 'en') {

        $code = strtolower($code);
        $charset = array();

        if (isset($this->charSets[$code])) {
            $chars = self::mb_str_to_array($this->charSets[$code]['upper']['chars']);
            foreach ($chars as $char) {

                $baseChar = $this->getBaseChar($char);

                $charset[$char] = array(
                    'upper' => $char,
                    'lower' => mb_strtolower($char),
                    'base' => $baseChar,
                    'value' => $this->getCharValue($baseChar)
                );
            }
        }

        return $charset;
    }

    public function getTiles($code = 'en') {

        $code = strtolower($code);
        $tiles = array();

        if (isset($this->charSets[$code])) {

            // add all the characters from the character set
            $chars = self::mb_str_to_array($this->charSets[$code]['upper']['chars']);
            foreach ($chars as $char) {

                $baseChar = $this->getBaseChar($char, 'upper');

                if (!isset($tiles[$baseChar])) {
                    $tiles[$baseChar] = array(
                        'upper' => array($char),
                        'lower' => array(mb_strtolower($char)),
                        'base' => $baseChar,
                        'value' => $this->getCharValue($baseChar)
                    );
                } else {
                    $tiles[$baseChar]['upper'][] = $char;
                    $tiles[$baseChar]['lower'][] = mb_strtolower($char);
                }
            }

            // add extra characters
            foreach ($this->charValues as $char => $value) {
                if (!isset($tiles[$char])) {
                    $tiles[$char] = array(
                        'upper' => $char,
                        'lower' => $char,
                        'base' => $char,
                        'value' => $value
                    );
                }
            }

        }

        return $tiles;
    }

    /**
     * @param string $char
     * @param string $case
     * @return bool|string
     */
    public function getBaseChar($char, $case = null)
    {
        // verify case parameter
        $case = !empty($case) ? strtolower($case) : null;
        if (!in_array($case, array('lower', 'upper')) || empty($case)) {
            if ($char == mb_strtolower($char)) {
                $case = 'lower';
            } else {
                $case = 'upper';
            }
        }

        // set base char to lower case
        $baseChar = mb_strtoupper($char);

        switch ($baseChar) {
            case 'Á':
            case 'à':
            case 'Á':
            case 'á':
            case 'Â':
            case 'â':
            case 'Ã':
            case 'ã':
            case 'Ä':
            case 'ä':
            case 'Å':
            case 'å':
            case 'Æ':
            case 'æ':
                $baseChar = ($case == 'lower') ? 'a' : 'A';
                break;
            case 'Ç':
            case 'ç':
            case 'Ć':
            case 'ć':
                $baseChar = ($case == 'lower') ? 'c' : 'C';
                break;
            case 'Ð':
            case 'ð':
                $baseChar = ($case == 'lower') ? 'd' : 'D';
                break;
            case 'È':
            case 'è':
            case 'É':
            case 'é':
            case 'Ê':
            case 'ê':
            case 'Ë':
            case 'ë':
            case 'Ę':
            case 'ę':
                $baseChar = ($case == 'lower') ? 'e' : 'E';
                break;
            case 'Ì':
            case 'ì':
            case 'Í':
            case 'í':
            case 'Î':
            case 'î':
            case 'Ï':
            case 'ï':
                $baseChar = ($case == 'lower') ? 'i' : 'I';
                break;
            case 'Ł':
            case 'ł':
                $baseChar = ($case == 'lower') ? 'l' : 'L';
                break;
            case 'Ñ':
            case 'ñ':
                $baseChar = ($case == 'lower') ? 'n' : 'N';
                break;
            case 'Ò':
            case 'ò':
            case 'Ó':
            case 'ó':
            case 'Ô':
            case 'ô':
            case 'Õ':
            case 'õ':
            case 'Ö':
            case 'ö':
            case 'Ø':
            case 'ø':
            case 'Œ':
            case 'œ':
                $baseChar = ($case == 'lower') ? 'o' : 'O';
                break;
            case 'ß':
            case 'Ś':
            case 'ś':
                $baseChar = ($case == 'lower') ? 's' : 'S';
                break;
            case 'Ù':
            case 'ù':
            case 'Ú':
            case 'ú':
            case 'Û':
            case 'û':
            case 'Ü':
            case 'ü':
                $baseChar = ($case == 'lower') ? 'u' : 'U';
                break;
            case '×':
            case '×':
                $baseChar = ($case == 'lower') ? 'x' : 'X';
                break;
            case 'Ý':
            case 'ý':
            case 'Ÿ':
            case 'ÿ':
                $baseChar = ($case == 'lower') ? 'y' : 'Y';
                break;
            case 'Ź':
            case 'ź':
            case 'Ż':
            case 'ż':
                $baseChar = ($case == 'lower') ? 'z' : 'Z';
                break;
            default:
                if ($case == 'lower') {
                    $baseChar = mb_strtolower($char);
                }
                break;
        }

        return $baseChar;
    }

    public function getCharValue($char) {

        $baseChar = $this->getBaseChar(mb_strtoupper($char));

        $value = isset($this->charValues[$baseChar]) ? $this->charValues[$baseChar] : 0;

        return $value;
    }

    /**
     * A substitution of str_split working with not only ASCII strings.
     * @param String $string
     * @return Array
     */
    function mb_str_to_array($string){
        mb_internal_encoding("UTF-8"); // Important
        $chars = array();
        for ($i = 0; $i < mb_strlen($string); $i++ ) {
            $chars[] = mb_substr($string, $i, 1);
        }

        return $chars;
    }
}