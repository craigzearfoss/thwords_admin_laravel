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
            ->select('thw_thwordplays.id', 'thw_thwordplays.lang', 'thw_thwordplays.topic', 'thw_thwordplays.description')
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
	 * Store a newly created thword play in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $thword = new Thwordplay;

        $thword->category_id    = Input::get('category_id');
        $thword->subject_id     = Input::get('subject_id');
        $thword->lang           = Input::get('lang');
        $thword->expert         = Input::get('expert');
        $thword->topic          = Input::get('topic');
        $thword->description    = Input::get('description');
        $thword->bonus          = Input::get('bonus');
        $thword->bonus_question = Input::get('bonus_question');
        $thword->answers        = Input::get('answers');
        $thword->source         = Input::get('source');
        $thword->notes          = Input::get('notes');

        if ($success = $thword->save()) {
            return Redirect::to('/admin/thword-play')->with('message', 'Thword Play created successfully.');
        } else {
            return Redirect::to('/admin/thword-play/create')->withErrors($thword->errors());
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
	 * Update the specified thword play in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $thword = Thwordplay::find($id);

        $thword->category_id    = Input::get('category_id');
        $thword->subject_id     = Input::get('subject_id');
        $thword->lang           = Input::get('lang');
        $thword->expert         = Input::get('expert');
        $thword->topic          = Input::get('topic');
        $thword->description    = Input::get('description');
        $thword->bonus          = Input::get('bonus');
        $thword->bonus_question = Input::get('bonus_question');
        $thword->answers        = Input::get('answers');
        $thword->source         = Input::get('source');
        $thword->notes          = Input::get('notes');

        if ($success = $thword->save()) {
            return Redirect::to('/admin/thword-play');
        } else {
            return Redirect::to('/admin/thword-play/' . $id . '/edit/')->withErrors($thword->errors());
        }
	}


	/**
	 * Remove the specified thword play from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Thwordplay::destroy($id);

        return Redirect::to('/admin/thword-play');
	}


    /**
     * Display the specified thword play.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        Breadcrumbs::addCrumb('Show', '/admin/thword-play/show');

        $thword = Thwordplay::find($id);
        $thwArray = $thword->toArray();

        return View::make('admin.thword-play.show', [
            'thwArray' => $thwArray
        ]);
    }


}
