<?php

App::bind('Bandelirium', 'Bandelirium');

class AdminBandeliriumController extends \AdminThwordController {

    protected $thword;

    protected $table;

    protected $fieldMappings;

    public function __construct(Bandelirium $bandelirium)
    {
        $this->name          = 'Bandelirium';
        $this->thword        = $bandelirium;
        $this->table         = 'thw_bandeliriums';
        $this->fieldMappings = $this->thword->getFieldMappings();
        $this->template      = 'thword';
        $this->url           = 'bandelirium';

        Breadcrumbs::setDivider('»');
        Breadcrumbs::addCrumb('Home', '/');
        Breadcrumbs::addCrumb('Admin', '/admin');
        Breadcrumbs::addCrumb($this->name, '/admin/' . $this->url);
    }
}
