<?php

class GameController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    public function about($game)
    {
        switch (strtolower($game)) {
            case 'anti-thwords':
                $template = 'game.about.anti-thwords';
                break;
            case 'bandelirium':
                $template = 'game.about.bandelirium';
                break;
            case 'foreign-thwords':
                $template = 'game.about.foreign-thwords';
                break;
            case 'thword-plays':
                $template = 'game.about.thword-plays';
                break;
            case 'thwords':
                $template = 'game.about.thwords';
                break;
            default:
                return Redirect::to('/home');
                break;
        }

        return View::make($template);
    }

    public function home()
    {
        return View::make('game.home');
    }

    public function index()
	{
        return View::make('game.index', [
        ]);
	}

	public function landing()
	{
		return View::make('game.landing');
	}


    public function play($game)
    {
        switch (strtolower($game)) {
            case 'anti-thwords':
                $template = 'game.play.anti-thwords';
                break;
            case 'bandelirium':
                $template = 'game.play.bandelirium';
                break;
            case 'foreign-thwords':
                $template = 'game.play.foreign-thwords';
                break;
            case 'thword-plays':
                $template = 'game.play.thword-plays';
                break;
            case 'thwords':
                $template = 'game.play.thwords';
                break;
            default:
                return Redirect::to('/home');
                break;
        }

        return View::make($template);
    }

}
