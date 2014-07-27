<?php

App::bind('Antithword', 'Antithword');

class AdminAntiThwordController extends \AdminThwordController {

    protected $thword;

    protected $table;

    protected $fieldMappings;

    public function __construct(Antithword $antithword)
    {
        $this->name          = 'Anti-Thword';
        $this->thword        = $antithword;
        $this->table         = 'thw_antithwords';
        $this->fieldMappings = $this->thword->getFieldMappings();
        $this->template      = 'thword';
        $this->url           = 'anti-thword';

        Breadcrumbs::setDivider('»');
        Breadcrumbs::addCrumb('Home', '/');
        Breadcrumbs::addCrumb('Admin', '/admin');
        Breadcrumbs::addCrumb($this->name, '/admin/' . $this->url);
    }
}
