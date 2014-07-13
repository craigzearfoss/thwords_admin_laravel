<?php

class AdminUserController extends \AdminController {

    protected $subject;

    public function __construct()
    {
        parent::__construct();

        Breadcrumbs::addCrumb('Users', '/admin/user');
    }

	/**
	 * Display a listing of the user.
	 *
	 * @return Response
	 */
	public function index()
    {
        $users = DB::table('users')
            ->select('users.id', 'users.first_name', 'users.last_name', 'users.email', 'users.activated', 'users.last_login')
            ->orderBy('last_name', 'asc')
            ->paginate(25);

        return View::make('admin.user.index', ['users' => $users]);
	}


	/**
	 * Show the form for creating a new subject.
	 *
	 * @return Response
	 */
	public function create()
	{
        Breadcrumbs::addCrumb('Create', '/admin/subject/subject');

        return View::make('admin.subject.create', []);
	}


	/**
	 * Store a newly created subject in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $subject = new Subject;

        $subject->name = Input::get('name');

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

        return View::make('admin.subject.edit', [
            'subject' => $subject
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

        $subject->name = Input::get('name');

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