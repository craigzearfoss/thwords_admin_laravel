<?php namespace Craigzearfoss\ThwordUtil;

//App::bind('Thword', 'Thword');

class ThwordUtil {

    const GAME_THWORDS = 1;
    const GAME_ANTI_THWORDS = 2;
    const GAME_FOREIGN_THWORDS = 3;
    const GAME_THWORD_PLAYS = 4;
    const GAME_BANDELIRIUM = 5;

    const MAX_CHARS = 24;

    public function generateLetterPlay($thword) {

        $charsetModel = new \Charset();

        $play = array(
            'term' => $thword->topic,
            'description' => $thword->description,
            'lang' => $thword->lang,
            'level' => $thword->level,
            'max_choices' => $thword->max_choices,
            'value' => 0,
            'total_chars' => 0,
            'unique_chars' => 0,
            'num_answers' => 0,
            'has_digits' => false,
            'answers' => array(),
        );

        $hasDigits = false;

        // get up to max_choices (or max characters) answers for the play
        $answers = explode('|', $thword->answers);
        $numAnswers = count($answers);
        $ids = array();
        $done = false;
        while ((count($ids) < $play['max_choices']) && !$done) {

            $found = false;
            $attempts = 0;
            while (($found == false) && ($attempts < 10)) {

                $id = mt_rand(0, $numAnswers - 1);

                if (!in_array($id, $ids)) {
                    $ids[] = $id;
                    $found = true;

                    $term = $answers[$id];
                    $termChars = self::mb_str_to_array($term);
                    $termTiles = array();
                    $termValue = 0;
                    foreach ($termChars as $char) {
                        $baseChar = $charsetModel->getBaseChar($char);
                        $charValue = $charsetModel->getCharValue($baseChar);

                        $termTiles[] = array(
                            'n' => $char,
                            'b' => $baseChar,
                            'v' => $charValue
                        );

                        $termValue = $termValue + $charValue;
                        if (is_numeric($baseChar)) $hasDigits = true;
                    }

                    if (($play['total_chars'] + count($termTiles)) <= self::MAX_CHARS) {

                        $play['answers'][] = array(
                            'term' => $term,
                            'value' => $termValue,
                            'tiles' => $termTiles
                        );
                        $play['value'] = $play['value'] + $termValue;

                        $play['total_chars'] = $play['total_chars'] + count($termTiles);
                        $play['num_answers'] = $play['num_answers'] + 1;

                    } else {
                        $done = true;
                    }
                }
                $attempts = $attempts + 1;
            }
        }

        $play['has_digits'] = $hasDigits;

        // get the tiles
        $play['tiles'] = $charsetModel->getTiles($thword->lang, $hasDigits);

        return $play;
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