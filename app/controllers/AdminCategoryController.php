<?php

class AdminCategoryController extends \AdminController {

    public function __construct()
    {
        parent::__construct();

        Breadcrumbs::addCrumb('Categories', '/admin/category');
    }

	/**
	 * Display a listing of the category.
	 *
	 * @return Response
	 */
	public function index()
	{
        $categories = DB::table('thw_categories')
            ->select('thw_categories.id', 'thw_categories.name')
            ->orderBy('name', 'asc')
            ->paginate(25);

        return View::make('admin.category.index', ['categories' => $categories]);
	}


	/**
	 * Show the form for creating a new category.
	 *
	 * @return Response
	 */
	public function create()
	{
        Breadcrumbs::addCrumb('Create', '/admin/category/create');

        return View::make('admin.category.create', []);
	}


	/**
	 * Store a newly created category in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $category = new Category;

        $category->name = Input::get('name');

        if ($success = $category->save()) {
            return Redirect::to('/admin/category')->with('message', 'Category created successfully.');
        } else {
            return Redirect::to('/admin/category/create')->withErrors($category->errors());
        }
	}


	/**
	 * Show the form for editing the specified category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Breadcrumbs::addCrumb('Edit', '/admin/category/edit');

        $category = Category::find($id);

        return View::make('admin.category.edit', [
            'category' => $category
        ]);
	}


	/**
	 * Update the specified category in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $category = Category::find($id);

        $category->name = Input::get('name');

        if ($success = $category->save()) {
            return Redirect::to('/admin/category');
        } else {
            return Redirect::to('/admin/category/' . $id . '/edit/')->withErrors($category->errors());
        }
	}


	/**
	 * Remove the specified category from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Category::destroy($id);

        return Redirect::to('/admin/category');
	}



    /**
     * Display the specified category.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        Breadcrumbs::addCrumb('Show', '/admin/category/show');

        $category = Category::find($id);

        $subjects = DB::table('thw_subjects')
            ->select('thw_subjects.id', 'thw_subjects.name')
            ->where('category_id', $id)
            ->orderBy('name', 'asc')
            ->get();

        return View::make('admin.category.show', [
            'category' => $category,
            'subjects' => $subjects
        ]);
    }


}
