<?php

use LaravelBook\Ardent\Ardent;

class Subject extends Ardent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'thw_subjects';

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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function antithwords()
    {
        return $this->hasMany('Antithwords');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function foreignthwords()
    {
        return $this->hasMany('Foreignthwords');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function thwordplays()
    {
        return $this->hasMany('Thwordplays');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function thwords()
    {
        return $this->hasMany('Thwords');
    }
}