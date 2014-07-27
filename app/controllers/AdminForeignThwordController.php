<?php

App::bind('Foreignthword', 'Foreignthword');

class AdminForeignThwordController extends \AdminThwordController {

    protected $thword;

    protected $table;

    protected $fieldMappings;

    public function __construct(Foreignthword $foreignthword)
    {
        $this->name          = 'Foreign Thword';
        $this->thword        = $foreignthword;
        $this->table         = 'thw_foreignthwords';
        $this->fieldMappings = $this->thword->getFieldMappings();
        $this->template      = 'thword';
        $this->url           = 'foreign-thword';

        Breadcrumbs::setDivider('»');
        Breadcrumbs::addCrumb('Home', '/');
        Breadcrumbs::addCrumb('Admin', '/admin');
        Breadcrumbs::addCrumb($this->name, '/admin/' . $this->url);
    }
}
