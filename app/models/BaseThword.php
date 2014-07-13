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


    /**
     * Ardent validation rules
     */
    public static $rules = array(
        'category_id'    => 'required|integer|exists:thw_categories,id',
        'subject_id'     => 'required|integer|exists:thw_subjects,id',
        'lang'           => 'required|exists:thw_languages,code1',
        'expert'         => 'integer|digits_between:0,5',
        'topic'          => 'required|max:100',
        'description'    => 'max:100',
        'bonus'          => 'boolean',
        'bonus_question' => 'max:100',
        'answers'        => 'required|min:12',
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
}