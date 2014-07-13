<?php

class AdminLanguageController extends \AdminController {

    public function __construct()
    {
        parent::__construct();

        Breadcrumbs::addCrumb('Languages', '/admin/language');
    }

	/**
	 * Display a listing of the language.
	 *
	 * @return Response
	 */
	public function index()
	{
        $languages = DB::table('thw_languages')
            ->select('thw_languages.id', 'thw_languages.name', 'thw_languages.code1', 'thw_languages.code2', 'thw_languages.spoken_in')
            ->orderBy('name', 'asc')
            ->paginate(25);

        return View::make('admin.language.index', ['languages' => $languages]);
	}


	/**
	 * Show the form for creating a new language.
	 *
	 * @return Response
	 */
	public function create()
	{
        Breadcrumbs::addCrumb('Create', '/admin/language/create');

        return View::make('admin.language.create', []);
	}


	/**
	 * Store a newly created language in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $language = new Language;

        $language->name      = Input::get('name');
        $language->code1     = Input::get('code1');
        $language->code2     = Input::get('code2');
        $language->spoken_in = Input::get('spoken_in');

        if ($success = $language->save()) {
            return Redirect::to('/admin/language')->with('message', 'Language created successfully.');
        } else {
            return Redirect::to('/admin/language/create')->withErrors($language->errors());
        }
	}


	/**
	 * Show the form for editing the specified language.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Breadcrumbs::addCrumb('Edit', '/admin/language/edit');

        $language = Language::find($id);

        return View::make('admin.language.edit', [
            'language' => $language
        ]);
	}


	/**
	 * Update the specified language in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $language = Language::find($id);

        $language->name      = Input::get('name');
        $language->code1     = Input::get('code1');
        $language->code2     = Input::get('code2');
        $language->spoken_in = Input::get('spoken_in');

        if ($success = $language->save()) {
            return Redirect::to('/admin/language');
        } else {
            return Redirect::to('/admin/language/' . $id . '/edit/')->withErrors($language->errors());
        }
	}


	/**
	 * Remove the specified language from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Language::destroy($id);

        return Redirect::to('/admin/language');
	}


}
