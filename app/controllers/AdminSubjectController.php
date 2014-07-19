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
	 * Show the form for creating a new subject.
	 *
	 * @return Response
	 */
	public function create()
	{
        Breadcrumbs::addCrumb('Create', '/admin/subject/subject');

        $categoryOptions = DB::table('thw_categories')->orderBy('name', 'asc')->lists('name','id');

        return View::make('admin.subject.create', [
            'categoryOptions' => $categoryOptions
        ]);
	}


	/**
	 * Store a newly created subject in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $subject = new Subject;

        $subject->name        = Input::get('name');
        $subject->category_id = Input::get('category_id');

        if ($success = $subject->save()) {
            return Redirect::to('/admin/subject')->with('message', 'Subject created successfully.');
        } else {
            return Redirect::to('/admin/subject/create')->withErrors($subject->errors());
        }
	}


	/**
	 * Show the form for editing the specified subject.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Breadcrumbs::addCrumb('Edit', '/admin/subject/edit');

        $subject = Subject::find($id);

        $categoryOptions = DB::table('thw_categories')->orderBy('name', 'asc')->lists('name','id');

        return View::make('admin.subject.edit', [
            'subject'         => $subject,
            'categoryOptions' => $categoryOptions
        ]);
	}


	/**
	 * Update the specified subject in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $subject = Subject::find($id);

        $subject->name        = Input::get('name');
        $subject->category_id = Input::get('category_id');

        if ($success = $subject->save()) {
            return Redirect::to('/admin/subject');
        } else {
            return Redirect::to('/admin/subject/' . $id . '/edit/')->withErrors($subject->errors());
        }
	}


	/**
	 * Remove the specified subject from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Subject::destroy($id);

        return Redirect::to('/admin/subject');
	}


}
