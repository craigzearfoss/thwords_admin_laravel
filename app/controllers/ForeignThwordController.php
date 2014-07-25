<?php

App::bind('Foreignthword', 'Foreignthword');

class ForeignThwordController extends \BaseController {

    public function __construct(Foreignthword $foreignthword)
    {
        $this->foreignthword = $foreignthword;
    }

    public function json($key) {

        if (!intval($key)) {
            $key = strtolower($key);
            if (in_array($key, array('random'))) {
                $thword = $this->foreignthword->findRandom();
            } else {
                // invalid key
                return Response::json(array());
            }
        } else {
            $thword = $this->foreignthword->find($key);
        }

        return Response::json($thword);
    }
}
