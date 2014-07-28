<?php

App::bind('Qthword', 'Qthword');

class AdminQThwordController extends \AdminThwordController {

    protected $thword;

    protected $table;

    protected $fieldMappings;

    public function __construct(Qthword $qthword)
    {
        $this->name          = 'Q-Thword';
        $this->thword        = $qthword;
        $this->table         = 'thw_qthwords';
        $this->fieldMappings = $this->thword->getFieldMappings();
        $this->template      = 'thword';
        $this->url           = 'q-thword';

        Breadcrumbs::setDivider('»');
        Breadcrumbs::addCrumb('Home', '/');
        Breadcrumbs::addCrumb('Admin', '/admin');
        Breadcrumbs::addCrumb($this->name, '/admin/' . $this->url);
    }
}
