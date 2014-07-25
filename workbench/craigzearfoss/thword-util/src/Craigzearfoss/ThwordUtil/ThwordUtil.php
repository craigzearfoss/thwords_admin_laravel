<?php namespace Craigzearfoss\ThwordUtil;

//App::bind('Thword', 'Thword');

class ThwordUtil {

    const PRIMARY_SEPARATOR = '|';

    const SECONDARY_SEPARATOR = '^';

    const DEFAULT_MAX_CHOICES = 4;

    const GAME_THWORDS = 1;
    const GAME_ANTI_THWORDS = 2;
    const GAME_FOREIGN_THWORDS = 3;
    const GAME_THWORD_PLAYS = 4;
    const GAME_BANDELIRIUM = 5;

    const MAX_THWORDS = 4;
    const MAX_CHARS = 24;

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

    public static function getCorrectAnswerList() {

        $answers = array();
        $answers[-2] = 'Sort';
        $answers[-1] = 'Type-in';
        $answers[0] = 'All Correct';
        for ($i=1; $i<11; $i++) {
            $answers[$i] = $i;
        }

        return $answers;
    }

    public static function getLevelList() {

        $levels = array();
        for ($i=1; $i<6; $i++) {
            $levels[$i] = $i;
        }

        return $levels;
    }

    public static function getMaxChoicesList() {

        $maxChoices = array();
        for ($i=2; $i<11; $i++) {
            $maxChoices[$i] = $i;
        }

        return $maxChoices;
    }

    public function generatePlay($thword, $game = 'thwords') {

        $play = array(
            'term' => $thword->topic,
            'lang' => $thword->lang,
            'level' => $thword->level,
            'points' => 0,
            'max_choices' => $thword->max_choices,
            'answers' => array(),
        );

        // get up to max_choices (or max characters) answers for the play
        $answers = explode('|', $thword->answers);
        $numAnswers = count($answers);
        $numChars = 0;
        $ids = array();
        while ((count($ids) < $play['max_choices']) && ($numChars <= self::MAX_CHARS)) {
            $found = false;
            $attempts = 0;
            while (($found == false) && ($attempts < 10)) {
                $id = mt_rand(0, $numAnswers - 1);
                if (!in_array($id, $ids)) {
                    $ids[] = $id;
                    $found = true;
                    $play['answers'][] = $answers[$id];
                }
                $attempts = $attempts + 1;
            }
        }

        // get the tiles
        $charsetModel = new \Charset();
        $play['tiles'] = $charsetModel->getTiles($thword->lang);

        var_dump($thword); echo '<hr>'; var_dump($play); die;

        return $play;
    }
}