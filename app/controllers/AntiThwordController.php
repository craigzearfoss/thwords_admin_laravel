<?php

App::bind('Antithword', 'Antithword');

class AntithwordController extends \BaseController {

    public function __construct(Antithword $antithword)
    {
        $this->antithword = $antithword;
    }

    public function json($key) {

        if (!intval($key)) {
            $key = strtolower($key);
            if (in_array($key, array('random'))) {
                $thword = $this->antithword->findRandom();
            } else {
                // invalid key
                return Response::json(array());
            }
        } else {
            $thword = $this->antithword->find($key);
        }

        return Response::json($thword);
    }
}
