<?php

class AdminForeignThwordController extends \AdminController {

    protected $subject;

    public function __construct()
    {
        parent::__construct();

        Breadcrumbs::addCrumb('Foreign Thwords', '/admin/foreign-thword');
    }

	/**
	 * Display a listing of the foreign thword.
	 *
	 * @return Response
	 */
	public function index()
    {
        $thwords = DB::table('thw_foreignthwords')
            ->select('thw_foreignthwords.id', 'thw_foreignthwords.topic')
            ->orderBy('id', 'asc')
            ->paginate(25);

        return View::make('admin.foreign-thword.index', ['thwords' => $thwords]);
	}


	/**
	 * Show the form for creating a new foreign thword.
	 *
	 * @return Response
	 */
	public function create()
	{
        Breadcrumbs::addCrumb('Create', '/admin/foreign-thword/create');

        $expertOptions = array(0=>0, 1=>1, 2=>2, 3=>3, 4=>4, 5=>5);
        $categoryOptions = DB::table('thw_categories')->orderBy('name', 'asc')->lists('name','id');
        $subjectOptions = DB::table('thw_subjects')->orderBy('name', 'asc')->lists('name','id');
        $languageOptions = DB::table('thw_languages')->orderBy('name', 'asc')->lists('name','code1');

        return View::make('admin.foreign-thword.create', [
            'expertOptions'   => $expertOptions,
            'categoryOptions' => $categoryOptions,
            'subjectOptions'  => $subjectOptions,
            'languageOptions' => $languageOptions
        ]);
	}


	/**
	 * Store a newly created foreign foreign thword in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $thword = new Foreignthword;

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
            return Redirect::to('/admin/foreign-thword')->with('message', 'Foreign Thword created successfully.');
        } else {
            return Redirect::to('/admin/foreign-thword/create')->withErrors($thword->errors());
        }
	}


	/**
	 * Show the form for editing the specified foregin thword.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Breadcrumbs::addCrumb('Edit', '/admin/foreign-thword/edit');

        $thword = Foreignthword::find($id);

        $expertOptions = array(0=>0, 1=>1, 2=>2, 3=>3, 4=>4, 5=>5);
        $categoryOptions = DB::table('thw_categories')->orderBy('name', 'asc')->lists('name','id');
        $subjectOptions = DB::table('thw_subjects')->orderBy('name', 'asc')->lists('name','id');
        $languageOptions = DB::table('thw_languages')->orderBy('name', 'asc')->lists('name','code1');

        return View::make('admin.foreign-thword.edit', [
            'thword'          => $thword,
            'expertOptions'   => $expertOptions,
            'categoryOptions' => $categoryOptions,
            'subjectOptions'  => $subjectOptions,
            'languageOptions' => $languageOptions
        ]);
	}


	/**
	 * Update the specified foreign thword in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $thword = Foreignthword::find($id);

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
            return Redirect::to('/admin/foreign-thword');
        } else {
            return Redirect::to('/admin/foreign-thword/' . $id . '/edit/')->withErrors($thword->errors());
        }
	}


	/**
	 * Remove the specified foreign thword from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Foreignthword::destroy($id);

        return Redirect::to('/admin/foreign-thword');
	}


    /**
     * Display the specified thword.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        Breadcrumbs::addCrumb('Show', '/admin/foreign-thword/show');

        $thword = Foreignthword::find($id);
        $thwArray = $thword->toArray();

        return View::make('admin.foreign-thword.show', [
            'thwArray' => $thwArray
        ]);
    }


}
