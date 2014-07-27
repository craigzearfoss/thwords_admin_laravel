<?php

class Thwordplay extends \BaseThword {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'thw_thwordplays';

    protected $fieldMappings = array(
        'parent_id' => array(
            'display' => false,
            'label' => 'Parent',
            'default' => null
        ),
        'category_id' => array(
            'display' => true,
            'label' => 'Category',
            'default' => 99
        ),
        'subject_id' => array(
            'display' => true,
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
            'label' => 'Topic',
            'default' => ''
        ),
        'description' => array(
            'display' => true,
            'label' => 'Description',
            'default' => ''
        ),
        'bonus' => array(
            'display' => true,
            'label' => 'Bonus',
            'default' => 0
        ),
        'bonus_question' => array(
            'display' => true,
            'label' => 'Bonus Question',
            'default' => ''
        ),
        'answers' => array(
            'display' => true,
            'label' => 'Answer(s)',
            'default' => ''
        ),
        'correct_answer' => array(
            'display' => true,
            'label' => 'Correct Answer(s)',
            'default' => 1  // for multiple answers separate the with a vertical bar
        ),
        'max_choices' => array(
            'display' => true,
            'label' => 'Max Choices',
            'default' => 4
        ),
        'details' => array(
            'display' => true,
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
                FROM (SELECT ROUND(RAND() * (SELECT MAX(id) FROM thw_thwordplays)) num, @num:=@num+1 FROM (SELECT @num:=0) AS a, thw_thwordplays LIMIT 1) AS b,
                thw_thwordplays AS t
                WHERE b.num = t.id";

        $cnt = 0;
        while (!($thword = DB::select(DB::raw($sql))) && ($cnt < 10)) {
            // try 10 times to get results and then give up
            $cnt = $cnt + 1;
        }

        return isset($thword[0]) ? $thword[0] : $thword;
    }


}