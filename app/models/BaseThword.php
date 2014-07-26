<?php

use LaravelBook\Ardent\Ardent;

class BaseThword extends Ardent {

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
            'default' => 999
        ),
        'subject_id' => array(
            'display' => true,
            'label' => 'Subject',
            'default' => 9999
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
            'label' => 'Correct Answer',
            'default' => 1
        ),
        'max_choices' => array(
            'display' => true,
            'label' => 'Max Choices',
            'default' => 4
        ),
        'details' => array(
            'display' => true,
            'label' => 'Details (Shown when answer is displayed.)',
            'default' => 0
        ),
        'source' => array(
            'display' => true,
            'label' => 'Source URL',
            'default' => ''
        ),
        'notes' => array(
            'display' => true,
            'label' => 'Notes (For internal reference. This is never displayed.)',
            'default' => 0
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


    /**
     * @return array
     */
    public function toArray() {

        $thwArray = array(
            'thword'   => $this->attributes,
            'category' => $this->category()->first()->attributes,
            'subject'  => $this->subject()->first()->attributes
        );

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