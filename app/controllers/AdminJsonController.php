<?php

class AdminJsonController extends \AdminController {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Return json array of all categories.
     *
     * @return Response
     */
    public function categories()
    {
        $categories = DB::table('thw_categories')
            ->select('thw_categories.id', 'thw_categories.name')
            ->orderBy('name', 'asc')
            ->get();

        return Response::json($categories);
    }

    /**
     * Return json array of subjects for the specified category.
     *
     * @param integer $categoryId
     * @return Response
     */
    public function categorySubjects($categoryId)
	{
        $subjects = DB::table('thw_subjects')
            ->select('thw_subjects.id', 'thw_subjects.name')
            ->where('category_id', $categoryId)
            ->orderBy('name', 'asc')
            ->get();

        return Response::json($subjects);
	}

    /**
     * Return json array of all subjects.
     *
     * @return Response
     */
    public function subjects()
    {
        $subjects = DB::table('thw_subjects')
            ->select('thw_subjects.id', 'thw_subjects.name')
            ->orderBy('name', 'asc')
            ->get();

        return Response::json($subjects);
    }

}
