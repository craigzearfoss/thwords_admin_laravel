<?php

use LaravelBook\Ardent\Ardent;

class Category extends Ardent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'thw_categories';

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
        'name'   => 'required'
    );
}