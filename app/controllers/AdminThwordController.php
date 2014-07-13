<?php

class AdminThwordController extends \AdminController {

    protected $subject;

    public function __construct()
    {
        parent::__construct();

        Breadcrumbs::addCrumb('Thwords', '/admin/thword');
    }

	/**
	 * Display a listing of the thword.
	 *
	 * @return Response
	 */
	public function index()
    {
        $thwords = DB::table('thw_thwords')
            ->select('thw_thwords.id', 'thw_thwords.topic')
            ->orderBy('id', 'asc')
            ->paginate(25);

        return View::make('admin.thword.index', ['thwords' => $thwords]);
	}


	/**
	 * Show the form for creating a new thword.
	 *
	 * @return Response
	 */
	public function create()
	{
        Breadcrumbs::addCrumb('Create', '/admin/thword/create');

        $expertOptions = array(0=>0, 1=>1, 2=>2, 3=>3, 4=>4, 5=>5);
        $categoryOptions = DB::table('thw_categories')->orderBy('name', 'asc')->lists('name','id');
        $subjectOptions = DB::table('thw_subjects')->orderBy('name', 'asc')->lists('name','id');
        $languageOptions = DB::table('thw_languages')->orderBy('name', 'asc')->lists('name','code1');

        return View::make('admin.thword.create', [
            'expertOptions'   => $expertOptions,
            'categoryOptions' => $categoryOptions,
            'subjectOptions'  => $subjectOptions,
            'languageOptions' => $languageOptions
        ]);
	}


	/**
	 * Store a newly created thword in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $thword = new Thword;


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
            return Redirect::to('/admin/thword')->with('message', 'Thword created successfully.');
        } else {
            return Redirect::to('/admin/thword/create')->withErrors($thword->errors());
        }
	}


	/**
	 * Show the form for editing the specified thword.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Breadcrumbs::addCrumb('Edit', '/admin/thword/edit');

        $thword = Thword::find($id);

        $expertOptions = array(0=>0, 1=>1, 2=>2, 3=>3, 4=>4, 5=>5);
        $categoryOptions = DB::table('thw_categories')->orderBy('name', 'asc')->lists('name','id');
        $subjectOptions = DB::table('thw_subjects')->orderBy('name', 'asc')->lists('name','id');
        $languageOptions = DB::table('thw_languages')->orderBy('name', 'asc')->lists('name','code1');

        return View::make('admin.thword.edit', [
            'thword'          => $thword,
            'expertOptions'   => $expertOptions,
            'categoryOptions' => $categoryOptions,
            'subjectOptions'  => $subjectOptions,
            'languageOptions' => $languageOptions
        ]);
	}


	/**
	 * Update the specified thword in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $thword = Thword::find($id);

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
            return Redirect::to('/admin/thword');
        } else {
            return Redirect::to('/admin/thword/' . $id . '/edit/')->withErrors($thword->errors());
        }
	}


	/**
	 * Remove the specified thword from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Thword::destroy($id);

        return Redirect::to('/admin/thword');
	}


}
