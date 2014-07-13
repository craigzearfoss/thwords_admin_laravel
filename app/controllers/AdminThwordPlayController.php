<?php

class AdminThwordPlayController extends \AdminController {

    protected $subject;

    public function __construct()
    {
        parent::__construct();

        Breadcrumbs::addCrumb('Thword Plays', '/admin/thword-play');
    }

	/**
	 * Display a listing of the thword play.
	 *
	 * @return Response
	 */
	public function index()
    {
        $thwords = DB::table('thw_thwordplays')
            ->select('thw_thwordplays.id', 'thw_thwordplays.topic', 'thw_thwordplays.description')
            ->orderBy('id', 'asc')
            ->paginate(25);

        return View::make('admin.thword-play.index', ['thwords' => $thwords]);
	}


	/**
	 * Show the form for creating a new thword play.
	 *
	 * @return Response
	 */
	public function create()
	{
        Breadcrumbs::addCrumb('Create', '/admin/thword-play/create');

        $expertOptions = array(0=>0, 1=>1, 2=>2, 3=>3, 4=>4, 5=>5);
        $categoryOptions = DB::table('thw_categories')->orderBy('name', 'asc')->lists('name','id');
        $subjectOptions = DB::table('thw_subjects')->orderBy('name', 'asc')->lists('name','id');
        $languageOptions = DB::table('thw_languages')->orderBy('name', 'asc')->lists('name','code1');

        return View::make('admin.thword-play.create', [
            'expertOptions'   => $expertOptions,
            'categoryOptions' => $categoryOptions,
            'subjectOptions'  => $subjectOptions,
            'languageOptions' => $languageOptions
        ]);
	}


	/**
	 * Store a newly created keyword in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $keyword = new Keyword;

        $keyword->term            = Input::get('term');
        $keyword->response_url_id = Input::get('response_url_id');

        $keyword->save();

        if ($success = $keyword->save()) {
            return Redirect::to('/admin/keyword')->with('message', 'Keywords created successfully.');
        } else {
            return Redirect::to('/admin/keyword/create')->withErrors($keyword->errors());
        }
	}


	/**
	 * Show the form for editing the specified thword play.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Breadcrumbs::addCrumb('Edit', '/admin/thword-play/edit');

        $thword = Thwordplay::find($id);

        $expertOptions = array(0=>0, 1=>1, 2=>2, 3=>3, 4=>4, 5=>5);
        $categoryOptions = DB::table('thw_categories')->orderBy('name', 'asc')->lists('name','id');
        $subjectOptions = DB::table('thw_subjects')->orderBy('name', 'asc')->lists('name','id');
        $languageOptions = DB::table('thw_languages')->orderBy('name', 'asc')->lists('name','code1');

        return View::make('admin.thword-play.edit', [
            'thword'          => $thword,
            'expertOptions'   => $expertOptions,
            'categoryOptions' => $categoryOptions,
            'subjectOptions'  => $subjectOptions,
            'languageOptions' => $languageOptions
        ]);
	}


	/**
	 * Update the specified keyword in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $keyword = Keyword::find($id);

        $keyword->term            = Input::get('term');
        $keyword->response_url_id = Input::get('response_url_id');

        if ($success = $keyword->save()) {
            return Redirect::to('/admin/keyword');
        } else {
            return Redirect::to('/admin/keyword/' . $id . '/edit/')->withErrors($keyword->errors());
        }
	}


	/**
	 * Remove the specified keyword from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Keyword::destroy($id);

        return Redirect::to('/admin/keyword');
	}


}
