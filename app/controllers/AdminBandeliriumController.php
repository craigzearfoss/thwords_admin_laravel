<?php

App::bind('Bandelirium', 'Bandelirium');

class AdminBandeliriumController extends \AdminController {

    protected $thword;

    protected $table;

    protected $fieldMappings;

    public function __construct(Bandelirium $bandelirium)
    {
        parent::__construct();

        $this->name          = 'Bandelirium';
        $this->thword        = $bandelirium;
        $this->table         = 'thw_bandeliriums';
        $this->fieldMappings = $this->thword->getFieldMappings();
        $this->template      = 'bandelirium';
        $this->url           = 'bandelirium';

        Breadcrumbs::addCrumb($this->name . 's', '/admin/' . $this->url);
    }


	/**
	 * Display a listing of the thword.
	 *
	 * @return Response
	 */
	public function index()
    {
        $thwords = DB::table($this->table)
            ->select(
                $this->table . '.id',
                $this->table . '.topic',
                $this->table . '.description'
            )
            ->orderBy('id', 'asc')
            ->paginate(25);

        return View::make('admin.' . $this->template . '.index', ['thwords' => $thwords]);
	}


	/**
	 * Show the form for creating a new thword.
	 *
	 * @return Response
	 */
	public function create()
	{
        Breadcrumbs::addCrumb('Create', '/admin/' . $this->url . '/create');

        $categoryOptions = DB::table('thw_categories')->orderBy('name', 'asc')->lists('name','id');
        $subjectOptions = DB::table('thw_subjects')->orderBy('name', 'asc')->lists('name','id');
        $languageOptions = DB::table('thw_languages')->orderBy('name', 'asc')->lists('name','code1');

        return View::make('admin.' .  $this->template . '.create', [
            'levelOptions'       => ThwordUtil::getLevelList(),
            'categoryOptions'    => $categoryOptions,
            'subjectOptions'     => $subjectOptions,
            'languageOptions'    => $languageOptions,
            'primarySeparator'   => ThwordUtil::getSeparatorCharacters(),
            'secondarySeparator' => ThwordUtil::getSeparatorCharacters(),
            'correctAnswerList'  =>ThwordUtil::getCorrectAnswerList(),
            'maxChoicesList'     => ThwordUtil::getMaxChoicesList(),
            'thword'             => array(
                'name'  => $this->name,
                'url'   => $this->url,
                'field' => $this->fieldMappings
            )
        ]);
	}


	/**
	 * Store a newly created thword in storage.
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
            //return Redirect::to('/admin/' . $this->url)->with('message', $this->name . ' created successfully.');
            Breadcrumbs::addCrumb('Show', '/admin/' . $this->url . '/show');

            $thwArray = $thword->toArray();

            return View::make('admin.' . $this->template . '.show', [
                'thwArray'   => $thwArray,
                'successMsg' => $this->name . ' was successfully created.'
            ]);
        } else {
            return Redirect::to('/admin/' . $this->url . '/create')->withErrors($thword->errors());
        }
	}


	/**
	 * Show the form for editing the specified thword.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Breadcrumbs::addCrumb('Edit', '/admin/' . $this->url . '/edit');

        $thword = $this->thword->find($id);

        $categoryOptions = DB::table('thw_categories')->orderBy('name', 'asc')->lists('name','id');
        $subjectOptions = DB::table('thw_subjects')->orderBy('name', 'asc')->lists('name','id');
        $languageOptions = DB::table('thw_languages')->orderBy('name', 'asc')->lists('name','code1');

        return View::make('admin.' . $this->template . '.edit', [
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
	 * Update the specified thword in storage.
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
            Breadcrumbs::addCrumb('Show', '/admin/' . $this->url . '/show');

            $thwArray = $thword->toArray();

            return View::make('admin.' . $this->template . '.show', [
                'thwArray'   => $thwArray,
                'successMsg' => $this->name . ' was successfully updated.'
            ]);
        } else {
            return Redirect::to('/admin/' . $this->url . '/' . $id . '/edit/')->withErrors($thword->errors());
        }
	}


	/**
	 * Remove the specified thword from storage.
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
     * Display the specified thword.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        Breadcrumbs::addCrumb('Show', '/admin/' . $this->url . '/show');

        if (!$thword = $this->thword->find($id)) {
            $thwArray = array();
        } else {
            $thwArray = $thword->toArray();
        }

        return View::make('admin.' . $this->template . '.show', [
            'thword' => array(
                'name'  => $this->name,
                'url'   => $this->url,
                'data'  => $thwArray,
                'field' => $this->fieldMappings
            )
        ]);
    }


    /**
     * Redirect to the first thword.
     *
     * @return Response
     */
    public function first()
    {
        $thword = DB::table($this->table)
            ->select($this->table . '.id')
            ->orderBy('id', 'asc')
            ->first();

        return Redirect::to('/admin/' . $this->url . '/' . $thword->id . '/show');
    }


    /**
     * Redirect to the previous thword.
     *
     * @param  int  $id
     * @return Response
     */
    public function previous($id)
    {
        $thword = DB::table($this->table)
            ->select($this->table . '.id')
            ->where('id', '<', $id)
            ->orderBy('id', 'desc')
            ->first();

        if (!empty($thword)) {
            return Redirect::to('/admin/' . $this->url . '/' . $thword->id . '/show');
        } else {
            // next thword not found
            return Redirect::to('/admin/' . $this->url . '/' . $id . '/show');
        }
    }


    /**
     * Redirect to the next thword.
     *
     * @param  int  $id
     * @return Response
     */
    public function next($id)
    {
        $thword = DB::table($this->table)
            ->select($this->table . '.id')
            ->where('id', '>', $id)
            ->orderBy('id', 'asc')
            ->first();

        if (!empty($thword)) {
            return Redirect::to('/admin/' . $this->url . '/' . $thword->id . '/show');
        } else {
            // next thword not found
            return Redirect::to('/admin/' . $this->url . '/' . $id . '/show');
        }
    }


    /**
     * Redirect to the last thword.
     *
     * @return Response
     */
    public function last()
    {
        $thword = DB::table($this->table)
            ->select($this->table . '.id')
            ->orderBy('id', 'desc')
            ->first();

        return Redirect::to('/admin/' . $this->url . '/' . $thword->id . '/show');
    }


}
