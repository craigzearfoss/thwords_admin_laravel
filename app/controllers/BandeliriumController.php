<?php

App::bind('Bandelirium', 'Bandelirium');

class BandeliriumController extends \BaseController {

    public function __construct(Bandelirium $bandelirium)
    {
        $this->bandelirium = $bandelirium;
    }

    public function json($key) {

        if (!intval($key)) {
            $key = strtolower($key);
            if (in_array($key, array('random'))) {
                $thword = $this->bandelirium->findRandom();
            } else {
                // invalid key
                return Response::json(array());
            }
        } else {
            $thword = $this->bandelirium->find($key);
        }

        return Response::json($thword);
    }
}
