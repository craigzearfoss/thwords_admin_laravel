<?php

class AdminUserController extends \AdminController {

    protected $user;

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
	 * Show the form for creating a new user.
	 *
	 * @return Response
	 */
	public function create()
	{
        Breadcrumbs::addCrumb('Create', '/admin/user/user');

        return View::make('admin.user.create', []);
	}


	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $user = new User;

        $user->name = Input::get('name');

        if ($success = $user->save()) {
            return Redirect::to('/admin/user')->with('message', 'User created successfully.');
        } else {
            return Redirect::to('/admin/user/create')->withErrors($user->errors());
        }
	}


	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Breadcrumbs::addCrumb('Edit', '/admin/user/edit');

        $user = User::find($id);

        return View::make('admin.user.edit', [
            'user' => $user
        ]);
	}


	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $user = User::find($id);

        $user->name = Input::get('name');

        if ($success = $user->save()) {
            return Redirect::to('/admin/user');
        } else {
            return Redirect::to('/admin/user/' . $id . '/edit/')->withErrors($user->errors());
        }
	}


	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        User::destroy($id);

        return Redirect::to('/admin/user');
	}


}
