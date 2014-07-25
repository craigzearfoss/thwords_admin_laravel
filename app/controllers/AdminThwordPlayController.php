<?php

App::bind('Thwordplay', 'Thwordplay');

class AdminThwordPlayController extends \AdminController {

    protected $thwordplay;

    public function __construct(Thwordplay $thwordplay)
    {
        parent::__construct();

        Breadcrumbs::addCrumb('Thword Plays', '/admin/thword-play');

        $this->thwordplay = $thwordplay;
    }

	/**
	 * Display a listing of the thword play.
	 *
	 * @return Response
	 */
	public function index()
    {
        $thwords = DB::table('thw_thwordplays')
            ->select('thw_thwordplays.id', 'thw_thwordplays.lang', 'thw_thwordplays.topic', 'thw_thwordplays.description')
            ->orderBy('id', 'asc')
            ->paginate(25);

        return View::make('admin.thword-play.index', ['thwords' => $thwords]);
	}


	/**
	 * Show the form for creating a new thword play.
	 *
	 * @return Response
	 */
	public function create()
	{
        Breadcrumbs::addCrumb('Create', '/admin/thword-play/create');

        $categoryOptions = DB::table('thw_categories')->orderBy('name', 'asc')->lists('name','id');
        $subjectOptions = DB::table('thw_subjects')->orderBy('name', 'asc')->lists('name','id');
        $languageOptions = DB::table('thw_languages')->orderBy('name', 'asc')->lists('name','code1');

        return View::make('admin.thword-play.create', [
            'levelOptions'       => ThwordUtil::getLevelList(),
            'categoryOptions'    => $categoryOptions,
            'subjectOptions'     => $subjectOptions,
            'languageOptions'    => $languageOptions,
            'primarySeparator'   => ThwordUtil::getSeparatorCharacters(),
            'secondarySeparator' => ThwordUtil::getSeparatorCharacters(),
            'correctAnswerList'  =>ThwordUtil::getCorrectAnswerList(),
            'maxChoicesList'     => ThwordUtil::getMaxChoicesList()
        ]);
	}


	/**
	 * Store a newly created thword play in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $thword = new Thwordplay;

        $thword->parent_id      = null;
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
            //return Redirect::to('/admin/thword-play')->with('message', 'Thword Play created successfully.');
            Breadcrumbs::addCrumb('Show', '/admin/thword-play/show');

            $thwArray = $thword->toArray();

            return View::make('admin.thword-play.show', [
                'thwArray'   => $thwArray,
                'successMsg' => 'Thword Play was successfully created.'
            ]);
        } else {
            return Redirect::to('/admin/thword-play/create')->withErrors($thword->errors());
        }
	}


	/**
	 * Show the form for editing the specified thword play.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Breadcrumbs::addCrumb('Edit', '/admin/thword-play/edit');

        $thword = Thwordplay::find($id);

        $categoryOptions = DB::table('thw_categories')->orderBy('name', 'asc')->lists('name','id');
        $subjectOptions = DB::table('thw_subjects')->orderBy('name', 'asc')->lists('name','id');
        $languageOptions = DB::table('thw_languages')->orderBy('name', 'asc')->lists('name','code1');

        return View::make('admin.thword-play.edit', [
            'thword'             => $thword,
            'levelOptions'       => ThwordUtil::getLevelList(),
            'categoryOptions'    => $categoryOptions,
            'subjectOptions'     => $subjectOptions,
            'languageOptions'    => $languageOptions,
            'primarySeparator'   => ThwordUtil::getSeparatorCharacters(),
            'secondarySeparator' => ThwordUtil::getSeparatorCharacters(),
            'correctAnswerList'  =>ThwordUtil::getCorrectAnswerList(),
            'maxChoicesList'     => ThwordUtil::getMaxChoicesList()
        ]);
	}


	/**
	 * Update the specified thword play in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $thword = Thwordplay::find($id);

        $thword->parent_id      = null;
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
            //return Redirect::to('/admin/thword-play/' . $id . '/show');
            Breadcrumbs::addCrumb('Show', '/admin/thword-play/show');

            $thwArray = $thword->toArray();

            return View::make('admin.thword-play.show', [
                'thwArray'   => $thwArray,
                'successMsg' => 'Thword Play was successfully updated.'
            ]);
        } else {
            return Redirect::to('/admin/thword-play/' . $id . '/edit/')->withErrors($thword->errors());
        }
	}


	/**
	 * Remove the specified thword play from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Thwordplay::destroy($id);

        return Redirect::to('/admin/thword-play');
	}


    /**
     * Display the specified thword play.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        Breadcrumbs::addCrumb('Show', '/admin/thword-play/show');

        $thword = Thwordplay::find($id);
        $thwArray = $thword->toArray();

        return View::make('admin.thword-play.show', [
            'thwArray' => $thwArray
        ]);
    }


    /**
     * Redirect to the first thword play.
     *
     * @return Response
     */
    public function first()
    {
        $thword = DB::table('thw_thwordplays')
            ->select('thw_thwordplays.id')
            ->orderBy('id', 'asc')
            ->first();

        return Redirect::to('/admin/thword-play/' . $thword->id . '/show');
    }


    /**
     * Redirect to the previous thword play.
     *
     * @param  int  $id
     * @return Response
     */
    public function previous($id)
    {
        $thword = DB::table('thw_thwordplays')
            ->select('thw_thwordplays.id')
            ->where('id', '<', $id)
            ->orderBy('id', 'desc')
            ->first();

        if (!empty($thword)) {
            return Redirect::to('/admin/thword-play/' . $thword->id . '/show');
        } else {
            // next thword not found
            return Redirect::to('/admin/thword-play/' . $id . '/show');
        }
    }


    /**
     * Redirect to the next thword play.
     *
     * @param  int  $id
     * @return Response
     */
    public function next($id)
    {
        $thword = DB::table('thw_thwordplays')
            ->select('thw_thwordplays.id')
            ->where('id', '>', $id)
            ->orderBy('id', 'asc')
            ->first();

        if (!empty($thword)) {
            return Redirect::to('/admin/thword-play/' . $thword->id . '/show');
        } else {
            // next thword not found
            return Redirect::to('/admin/thword-play/' . $id . '/show');
        }
    }


    /**
     * Redirect to the last thword play.
     *
     * @return Response
     */
    public function last()
    {
        $thword = DB::table('thw_thwordplays')
            ->select('thw_thwordplays.id')
            ->orderBy('id', 'desc')
            ->first();

        return Redirect::to('/admin/thword-play/' . $thword->id . '/show');
    }


}
