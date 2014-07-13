<?php

use LaravelBook\Ardent\Ardent;

class Foreignthword extends Ardent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'thw_foreignthwords';

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
}