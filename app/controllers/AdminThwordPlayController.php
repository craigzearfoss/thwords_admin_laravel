<?php

App::bind('Thwordplay', 'Thwordplay');

class AdminThwordPlayController extends \AdminThwordController {

    protected $thword;

    protected $table;

    protected $fieldMappings;

    public function __construct(Thwordplay $thwordplay)
    {
        $this->name          = 'Thword Play';
        $this->thword        = $thwordplay;
        $this->table         = 'thw_thwordplays';
        $this->fieldMappings = $this->thword->getFieldMappings();
        $this->template      = 'thword';
        $this->url           = 'thword-play';

        Breadcrumbs::setDivider('»');
        Breadcrumbs::addCrumb('Home', '/');
        Breadcrumbs::addCrumb('Admin', '/admin');
        Breadcrumbs::addCrumb($this->name, '/admin/' . $this->url);
    }
}
