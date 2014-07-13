<?php

class AdminAntiThwordController extends \AdminController {

    protected $subject;

    public function __construct()
    {
        parent::__construct();

        Breadcrumbs::addCrumb('Anti-Thwords', '/admin/anti-thword');
    }

	/**
	 * Display a listing of the anti-thword.
	 *
	 * @return Response
	 */
	public function index()
    {
        $thwords = DB::table('thw_antithwords')
            ->select('thw_antithwords.id', 'thw_antithwords.topic', 'thw_antithwords.description')
            ->orderBy('id', 'asc')
            ->paginate(25);

        return View::make('admin.anti-thword.index', ['thwords' => $thwords]);
	}


	/**
	 * Show the form for creating a new anti-thword.
	 *
	 * @return Response
	 */
	public function create()
	{
        Breadcrumbs::addCrumb('Create', '/admin/anti-thword/create');

        $expertOptions = array(0=>0, 1=>1, 2=>2, 3=>3, 4=>4, 5=>5);
        $categoryOptions = DB::table('thw_categories')->orderBy('name', 'asc')->lists('name','id');
        $subjectOptions = DB::table('thw_subjects')->orderBy('name', 'asc')->lists('name','id');
        $languageOptions = DB::table('thw_languages')->orderBy('name', 'asc')->lists('name','code1');

        return View::make('admin.anti-thword.create', [
            'expertOptions'   => $expertOptions,
            'categoryOptions' => $categoryOptions,
            'subjectOptions'  => $subjectOptions,
            'languageOptions' => $languageOptions
        ]);
	}


	/**
	 * Store a newly created anti-thword in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $thword = new Antithword;

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
            return Redirect::to('/admin/anti-thword')->with('message', 'Anti-Thword created successfully.');
        } else {
            return Redirect::to('/admin/anti-thword/create')->withErrors($thword->errors());
        }
	}


	/**
	 * Show the form for editing the specified anti-thwod.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Breadcrumbs::addCrumb('Edit', '/admin/anti-thword/edit');

        $thword = Antithword::find($id);

        $expertOptions = array(0=>0, 1=>1, 2=>2, 3=>3, 4=>4, 5=>5);
        $categoryOptions = DB::table('thw_categories')->orderBy('name', 'asc')->lists('name','id');
        $subjectOptions = DB::table('thw_subjects')->orderBy('name', 'asc')->lists('name','id');
        $languageOptions = DB::table('thw_languages')->orderBy('name', 'asc')->lists('name','code1');

        return View::make('admin.anti-thword.edit', [
            'thword'          => $thword,
            'expertOptions'   => $expertOptions,
            'categoryOptions' => $categoryOptions,
            'subjectOptions'  => $subjectOptions,
            'languageOptions' => $languageOptions
        ]);
	}


	/**
	 * Update the specified anti-thword in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $thword = Antithword::find($id);

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
            return Redirect::to('/admin/anti-thword');
        } else {
            return Redirect::to('/admin/anti-thword/' . $id . '/edit/')->withErrors($thword->errors());
        }
	}


	/**
	 * Remove the specified anti-thword from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Antithword::destroy($id);

        return Redirect::to('/admin/anti-thword');
	}


}
