<?php

class AdminBandeliriumController extends \AdminController {

    protected $subject;

    public function __construct()
    {
        parent::__construct();

        Breadcrumbs::addCrumb('Bandeliriums', '/admin/bandelirium');
    }


	/**
	 * Display a listing of the bandelirium.
	 *
	 * @return Response
	 */
	public function index()
    {
        $thwords = DB::table('thw_bandeliriums')
            ->select('thw_bandeliriums.id', 'thw_bandeliriums.topic', 'thw_bandeliriums.description')
            ->orderBy('id', 'asc')
            ->paginate(25);

        return View::make('admin.bandelirium.index', ['thwords' => $thwords]);
	}


	/**
	 * Show the form for creating a new bandelirium.
	 *
	 * @return Response
	 */
	public function create()
	{
        Breadcrumbs::addCrumb('Create', '/admin/bandelirium/create');

        $categoryOptions = DB::table('thw_categories')->orderBy('name', 'asc')->lists('name','id');
        $subjectOptions = DB::table('thw_subjects')->orderBy('name', 'asc')->lists('name','id');
        $languageOptions = DB::table('thw_languages')->orderBy('name', 'asc')->lists('name','code1');

        return View::make('admin.bandelirium.create', [
            'levelOptions'       => ThwordUtil::getLevelList(),
            'categoryOptions'    => $categoryOptions,
            'subjectOptions'     => $subjectOptions,
            'languageOptions'    => $languageOptions,
            'primarySeparator'   => ThwordUtil::getSeparatorCharacters(),
            'secondarySeparator' => ThwordUtil::getSeparatorCharacters(),
            'maxChoicesList'     => ThwordUtil::getMaxChoicesList()
        ]);
	}


	/**
	 * Store a newly created bandelirium in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $thword = new Bandelirium;

        $parentId = Input::get('parent_id');

        $thword->parent_id      = (!empty($parentId)) ? $parentId : null;
        $thword->category_id    = Input::get('category_id');
        $thword->subject_id     = Input::get('subject_id');
        $thword->lang           = Input::get('lang');
        $thword->level          = Input::get('level');
        $thword->topic          = Input::get('topic');
        $thword->description    = Input::get('description');
        $thword->bonus          = (Input::get('my_checkbox') === '1') ? 1 : 0;
        $thword->bonus_question = Input::get('bonus_question');
        $thword->answers        = Input::get('answers');
        $thword->correct_answer = Input::get('correct_answer');
        $thword->details        = Input::get('details');
        $thword->max_choices    = Input::get('max_choices');
        $thword->source         = Input::get('source');
        $thword->notes          = Input::get('notes');

        // make sure answers have the correct separator characters
        $primarySeparator = Input::get('primary_separator');
        if ($primarySeparator != \Craigzearfoss\ThwordUtil\ThwordUtil::PRIMARY_SEPARATOR) {
            $thword->answers = str_replace($primarySeparator, '|', $thword->answers);
        }
        $secondarySeparator = Input::get('secondary_separator');
        if ($secondarySeparator != \Craigzearfoss\ThwordUtil\ThwordUtil::SECONDARY_SEPARATOR) {
            $thword->answers = str_replace($secondarySeparator, '|', $thword->answers);
        }

        if ($success = $thword->save()) {
            //return Redirect::to('/admin/bandelirium')->with('message', 'Bandelirium created successfully.');
            Breadcrumbs::addCrumb('Show', '/admin/bandelirium/show');

            $thwArray = $thword->toArray();

            return View::make('admin.bandelirium.show', [
                'thwArray'   => $thwArray,
                'successMsg' => 'Bandelirium was successfully created.'
            ]);
        } else {
            return Redirect::to('/admin/bandelirium/create')->withErrors($thword->errors());
        }
	}


	/**
	 * Show the form for editing the specified bandelirium.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Breadcrumbs::addCrumb('Edit', '/admin/bandelirium/edit');

        $thword = Bandelirium::find($id);

        $categoryOptions = DB::table('thw_categories')->orderBy('name', 'asc')->lists('name','id');
        $subjectOptions = DB::table('thw_subjects')->orderBy('name', 'asc')->lists('name','id');
        $languageOptions = DB::table('thw_languages')->orderBy('name', 'asc')->lists('name','code1');

        return View::make('admin.bandelirium.edit', [
            'thword'             => $thword,
            'levelOptions'       => ThwordUtil::getLevelList(),
            'categoryOptions'    => $categoryOptions,
            'subjectOptions'     => $subjectOptions,
            'languageOptions'    => $languageOptions,
            'primarySeparator'   => ThwordUtil::getSeparatorCharacters(),
            'secondarySeparator' => ThwordUtil::getSeparatorCharacters(),
            'maxChoicesList'     => ThwordUtil::getMaxChoicesList()
        ]);
	}


	/**
	 * Update the specified bandelirium in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $thword = Bandelirium::find($id);

        $parentId = Input::get('parent_id');

        $thword->parent_id      = !empty($parentId) ? $parentId : null;
        $thword->category_id    = Input::get('category_id');
        $thword->subject_id     = Input::get('subject_id');
        $thword->lang           = Input::get('lang');
        $thword->level          = Input::get('level');
        $thword->topic          = Input::get('topic');
        $thword->description    = Input::get('description');
        $thword->bonus          = (Input::get('my_checkbox') === '1') ? 1 : 0;
        $thword->bonus_question = Input::get('bonus_question');
        $thword->answers        = Input::get('answers');
        $thword->correct_answer = Input::get('correct_answer');
        $thword->details        = Input::get('details');
        $thword->max_choices    = Input::get('max_choices');
        $thword->source         = Input::get('source');
        $thword->notes          = Input::get('notes');

        // make sure answers have the correct separator characters
        $primarySeparator = Input::get('primary_separator');
        if ($primarySeparator != \Craigzearfoss\ThwordUtil\ThwordUtil::PRIMARY_SEPARATOR) {
            $thword->answers = str_replace($primarySeparator, '|', $thword->answers);
        }
        $secondarySeparator = Input::get('secondary_separator');
        if ($secondarySeparator != \Craigzearfoss\ThwordUtil\ThwordUtil::SECONDARY_SEPARATOR) {
            $thword->answers = str_replace($secondarySeparator, '|', $thword->answers);
        }

        if ($success = $thword->save()) {
            //return Redirect::to('/admin/thword');
            Breadcrumbs::addCrumb('Show', '/admin/bandelirium/show');

            $thwArray = $thword->toArray();

            return View::make('admin.bandelirium.show', [
                'thwArray'   => $thwArray,
                'successMsg' => 'Bandelirium was successfully updated.'
            ]);
        } else {
            return Redirect::to('/admin/bandelirium/' . $id . '/edit/')->withErrors($thword->errors());
        }
	}


	/**
	 * Remove the specified bandelirium from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Bandelirium::destroy($id);

        return Redirect::to('/admin/thword');
	}


    /**
     * Display the specified bandelirium.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        Breadcrumbs::addCrumb('Show', '/admin/bandelirium/show');

        $thword = Bandelirium::find($id);
        $thwArray = $thword->toArray();

        return View::make('admin.bandelirium.show', [
            'thwArray' => $thwArray
        ]);
    }


    /**
     * Redirect to the first thword.
     *
     * @return Response
     */
    public function first()
    {
        $thword = DB::table('thw_bandeliriums')
            ->select('thw_bandeliriums.id')
            ->orderBy('id', 'asc')
            ->first();

        return Redirect::to('/admin/bandelirium/' . $thword->id . '/show');
    }


    /**
     * Redirect to the previous bandelirium.
     *
     * @param  int  $id
     * @return Response
     */
    public function previous($id)
    {
        $thword = DB::table('thw_bandeliriums')
            ->select('thw_bandeliriums.id')
            ->where('id', '<', $id)
            ->orderBy('id', 'desc')
            ->first();

        if (!empty($thword)) {
            return Redirect::to('/admin/bandelirium/' . $thword->id . '/show');
        } else {
            // next bandelirium not found
            return Redirect::to('/admin/bandelirium/' . $id . '/show');
        }
    }


    /**
     * Redirect to the next bandelirium.
     *
     * @param  int  $id
     * @return Response
     */
    public function next($id)
    {
        $thword = DB::table('thw_bandeliriums')
            ->select('thw_bandeliriums.id')
            ->where('id', '>', $id)
            ->orderBy('id', 'asc')
            ->first();

        if (!empty($thword)) {
            return Redirect::to('/admin/bandelirium/' . $thword->id . '/show');
        } else {
            // next thword not found
            return Redirect::to('/admin/bandelirium/' . $id . '/show');
        }
    }


    /**
     * Redirect to the last bandelirium.
     *
     * @return Response
     */
    public function last()
    {
        $thword = DB::table('thw_bandeliriums')
            ->select('thw_bandeliriums.id')
            ->orderBy('id', 'desc')
            ->first();

        return Redirect::to('/admin/bandelirium/' . $thword->id . '/show');
    }


}
