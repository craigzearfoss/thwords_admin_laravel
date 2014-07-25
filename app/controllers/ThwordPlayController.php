<?php

App::bind('Thwordplay', 'Thwordplay');

class ThwordPLayController extends \BaseController {

    public function __construct(Thwordplay $thwordplay)
    {
        $this->thwordplay = $thwordplay;
    }

    public function json($key) {

        if (!intval($key)) {
            $key = strtolower($key);
            if (in_array($key, array('random'))) {
                $thword = $this->thwordplay->findRandom();
            } else {
                // invalid key
                return Response::json(array());
            }
        } else {
            $thword = $this->thwordplay->find($key);
        }

        return Response::json($thword);
    }
}
