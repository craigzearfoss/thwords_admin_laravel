<?php

use LaravelBook\Ardent\Ardent;

class BaseThword extends Ardent {

    const PRIMARY_SEPARATOR = '|';

    const SECONDARY_SEPARATOR = '^';

    const DEFAULT_MAX_CHOICES = 4;

    const DEFAULT_MAX_THWORDS = 4;

    const DEFAULT_MAX_CHARS = 24;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array();

    protected $fillable = [];

    protected $guarded = array('id');

    protected $fieldMappings = array(
        'parent_id' => array(
            'display' => true,
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
            'display' => true,
            'label' => 'Language',
            'default' => 'en'
        ),
        'level' => array(
            'display' => true,
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
        'points' => array(
            'display' => true,
            'label' => 'Points',
            'default' => 1
        ),
        'details' => array(
            'display' => true,
            'label' => 'Details (Shown when answer is displayed.)',
            'default' => ''
        ),
        'dt' => array(
            'display' => false,
            'label' => 'Date',
            'default' => '0000-00-00'
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

    /**
     * Ardent validation rules
     */
    public static $rules = array(
        'category_id'    => 'required|integer|exists:thw_categories,id',
        'subject_id'     => 'required|integer|exists:thw_subjects,id',
        'lang'           => 'required|exists:thw_languages,code1',
        'level'         => 'integer|digits_between:0,5',
        'topic'          => 'required|max:250',
        'description'    => 'max:250',
        'bonus'          => 'boolean',
        'bonus_question' => 'max:250',
        'answers'        => 'required|min:1',
        'source'         => 'url|max:250',
        'notes'          => 'max:250'
    );


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('Category');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject()
    {
        return $this->belongsTo('Subject');
    }

    public static function getPrimarySeparator() { return self::PRIMARY_SEPARATOR; }
    public static function getSecondarySeparator() { return self::SECONDARY_SEPARATOR; }
    public static function getDefaultMaxChars() { return self::DEFAULT_MAX_CHARS; }
    public static function getDefaultMaxChoices() { return self::DEFAULT_MAX_CHOICES; }
    public static function getDefaultMaxThwords() { return self::DEFAULT_MAX_THWORDS; }

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
        $answers[-3] = 'Scramble';
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


    public static function getPointsList() {

        $points = array();
        for ($i=0; $i<11; $i++) {
            $points[$i] = $i;
        }

        return $points;
    }


    /**
     * @return array
     */
    public function toArray() {

        $thwArray = array(
            'thword'   => $this->attributes,
            'category' => $this->category()->first()->attributes,
            'subject'  => $this->subject()->first()->attributes
        );

        $thwArray['thword']['correct_answer'] = explode('|', $thwArray['thword']['correct_answer']);

        return $thwArray;
    }


    public function findRandom() {

        $sql = "SELECT t.*
                FROM (SELECT ROUND(RAND() * (SELECT MAX(id) FROM thw_thwords)) num, @num:=@num+1 FROM (SELECT @num:=0) AS a, thw_thwords LIMIT 1) AS b,
                thw_thwords AS t
                WHERE b.num = t.id";

        $cnt = 0;
        while (!($thword = DB::select(DB::raw($sql))) && ($cnt < 10)) {
            // try 10 times to get results and then give up
            $cnt = $cnt + 1;
        }

        return isset($thword[0]) ? $thword[0] : $thword;
    }


    public function getFieldMappings() {

        return $this->fieldMappings;
    }

}