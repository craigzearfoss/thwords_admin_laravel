<?php

class Antithword extends BaseThword {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'thw_antithwords';

    protected $fieldMappings = array(
        'parent_id' => array(
            'display' => false,
            'label' => 'Parent',
            'default' => null
        ),
        'category_id' => array(
            'display' => false,
            'label' => 'Category',
            'default' => 99
        ),
        'subject_id' => array(
            'display' => false,
            'label' => 'Subject',
            'default' => 999
        ),
        'lang' => array(
            'display' => false,
            'label' => 'Language',
            'default' => 'en'
        ),
        'level' => array(
            'display' => false,
            'label' => 'Level',
            'default' => 0
        ),
        'topic' => array(
            'display' => true,
            'label' => 'Term',
            'default' => ''
        ),
        'description' => array(
            'display' => true,
            'label' => 'Definition',
            'default' => ''
        ),
        'bonus' => array(
            'display' => false,
            'label' => 'Bonus',
            'default' => 0
        ),
        'bonus_question' => array(
            'display' => false,
            'label' => 'Bonus Question',
            'default' => ''
        ),
        'answers' => array(
            'display' => true,
            'label' => 'Antonyms',
            'default' => ''
        ),
        'correct_answer' => array(
            'display' => false,
            'label' => 'Correct Answer(s)',
            'default' => 0  // for multiple answers separate the with a vertical bar
        ),
        'max_choices' => array(
            'display' => true,
            'label' => 'Max Choices',
            'default' => 4
        ),
        'points' => array(
            'display' => true,
            'label' => 'Points',
            'default' => 1
        ),
        'details' => array(
            'display' => false,
            'label' => 'Details (Shown when answer is displayed.)',
            'default' => ''
        ),
        'source' => array(
            'display' => true,
            'label' => 'Source URL',
            'default' => ''
        ),
        'notes' => array(
            'display' => true,
            'label' => 'Notes (For internal reference. This is never displayed.)',
            'default' => ''
        )
    );

    public function findRandom() {

        $sql = "SELECT t.*
                FROM (SELECT ROUND(RAND() * (SELECT MAX(id) FROM thw_antithwords)) num, @num:=@num+1 FROM (SELECT @num:=0) AS a, thw_antithwords LIMIT 1) AS b,
                thw_antithwords AS t
                WHERE b.num = t.id";

        $cnt = 0;
        while (!($thword = DB::select(DB::raw($sql))) && ($cnt < 10)) {
            // try 10 times to get results and then give up
            $cnt = $cnt + 1;
        }

        return isset($thword[0]) ? $thword[0] : $thword;
    }


}