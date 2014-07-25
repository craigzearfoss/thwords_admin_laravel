<?php

App::bind('Thword', 'Thword');

class ThwordController extends \BaseController {

    public function __construct(Thword $thword)
    {
        $this->thword = $thword;
    }

    public function json($key) {

        if (!intval($key)) {
            $key = strtolower($key);
            if (in_array($key, array('random'))) {
                $thword = $this->thword->findRandom();
            } else {
                // invalid key
                return Response::json(array());
            }
        } else {
            $thword = $this->thword->find($key);
        }

        $play = ThwordUtil::generatePlay($thword, \Craigzearfoss\ThwordUtil\ThwordUtil::GAME_THWORDS);
die;

        return Response::json($play);
    }
}
