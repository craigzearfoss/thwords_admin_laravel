<?php

class AdminSubjectController extends \AdminController {

    protected $subject;

    public function __construct()
    {
        parent::__construct();

        Breadcrumbs::addCrumb('Subjects', '/admin/subject');
    }

	/**
	 * Display a listing of the subject.
	 *
	 * @return Response
	 */
	public function index()
    {
        $subjects = DB::table('thw_subjects')
            ->select('thw_subjects.id', 'thw_subjects.name')
            ->orderBy('name', 'asc')
            ->paginate(25);

        return View::make('admin.subject.index', ['subjects' => $subjects]);
	}


	/**
	 * Show the form for creating a new keyword.
	 *
	 * @return Response
	 */
	public function create()
	{
        Breadcrumbs::addCrumb('Create', '/admin/keyword/create');

        $responseUrlOptions = DB::table('response_urls')->orderBy('url', 'asc')->lists('url','id');

        return View::make('admin.keyword.create', [
            'responseUrlOptions' => $responseUrlOptions
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
	 * Show the form for editing the specified keyword.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Breadcrumbs::addCrumb('Edit', '/admin/keyword/edit');

        $keyword = Keyword::find($id);
        $responseUrlOptions = DB::table('response_urls')->orderBy('url', 'asc')->lists('url','id');

        return View::make('admin.keyword.edit', [
            'keyword' => $keyword,
            'responseUrlOptions' => $responseUrlOptions
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
