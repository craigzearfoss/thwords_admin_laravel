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

        Breadcrumbs::addCrumb($this->name, '/admin/' . $this->url);
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

        return View::make('admin.' . $this->template . '.index', [
            'thwords'    => $thwords,
            'thwordData' => array(
                'name'  => $this->name,
                'url'   => $this->url,
                'field' => $this->fieldMappings
            )
        ]);
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
            'levelOptions'       => $this->thword->getLevelList(),
            'categoryOptions'    => $categoryOptions,
            'subjectOptions'     => $subjectOptions,
            'languageOptions'    => $languageOptions,
            'primarySeparator'   => $this->thword->getSeparatorCharacters(),
            'secondarySeparator' => $this->thword->getSeparatorCharacters(),
            'correctAnswerList'  => $this->thword->getCorrectAnswerList(),
            'maxChoicesList'     => $this->thword->getMaxChoicesList(),
            'thwordData'         => array(
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
        $parentId      = Input::get('parent_id');
        $categoryId    = Input::get('category_id');
        $subjectId     = Input::get('subject_id');
        $lang          = Input::get('lang');
        $level         = Input::get('level');
        $topic         = Input::get('topic');
        $description   = Input::get('description');
        $answers       = Input::get('answers');
        $correctAnswer = Input::get('correct_answer');
        $maxChoices    = Input::get('max_choices');
        $bonus         = (Input::get('my_checkbox') === '1') ? 1 : 0;
        $bonusQuestion = Input::get('bonus_question');
        $details       = Input::get('details');
        $source        = Input::get('source');
        $notes         = Input::get('notes');

        $this->thword->parent_id      = (!empty($parentId)) ? $parentId : null;
        $this->thword->category_id    = isset($categoryId) ? $categoryId : $this->fieldMappings['category_id']['default'];
        $this->thword->subject_id     = isset($subjectId) ? $subjectId : $this->fieldMappings['subject_id']['default'];
        $this->thword->lang           = isset($lang) ? $lang : $this->fieldMappings['lang']['default'];
        $this->thword->level          = isset($level) ? $level : $this->fieldMappings['level']['default'];
        $this->thword->topic          = isset($topic) ? $topic : $this->fieldMappings['topic']['default'];
        $this->thword->description    = isset($description) ? $description : $this->fieldMappings['description']['default'];
        $this->thword->answers        = isset($answers) ? $answers : $this->fieldMappings['answers']['default'];
        $this->thword->correct_answer = isset($correctAnswer) ? $correctAnswer : $this->fieldMappings['correct_answer']['default'];
        $this->thword->max_choices    = isset($maxChoices) ? $maxChoices : $this->fieldMappings['max_choices']['default'];
        $this->thword->bonus          = $bonus;
        $this->thword->bonus_question = isset($bonusQuestion) ? $bonusQuestion : $this->fieldMappings['bonus_question']['default'];
        $this->thword->details        = isset($details) ? $details : $this->fieldMappings['details']['default'];
        $this->thword->source         = isset($source) ? $source : $this->fieldMappings['source']['default'];
        $this->thword->notes          = isset($notes) ? $notes : $this->fieldMappings['notes']['default'];

        // make sure answers have the correct separator characters
        $primarySeparator = Input::get('primary_separator');
        if ($primarySeparator != \BaseThword::PRIMARY_SEPARATOR) {
            $this->thword->answers = str_replace($primarySeparator, '|', $this->thword->answers);
        }
        $secondarySeparator = Input::get('secondary_separator');
        if ($secondarySeparator != \BaseThword::SCONDARY_SEPARATOR) {
            $this->thword->answers = str_replace($secondarySeparator, '|', $this->thword->answers);
        }

        if ($success = $this->thword->save()) {
            //return Redirect::to('/admin/' . $this->url)->with('message', $this->name . ' created successfully.');
            Breadcrumbs::addCrumb('Show', '/admin/' . $this->url . '/show');

            $thwArray = $this->thword->toArray();

            return View::make('admin.' . $this->template . '.show', [
                'successMsg' => $this->name . ' was successfully created.',
                'thwordData' => array(
                    'name'  => $this->name,
                    'url'   => $this->url,
                    'data'  => $thwArray,
                    'field' => $this->fieldMappings
                )
            ]);
        } else {
            return Redirect::to('/admin/' . $this->url . '/create')->withErrors($this->thword->errors());
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
            'levelOptions'       => $this->thword->getLevelList(),
            'categoryOptions'    => $categoryOptions,
            'subjectOptions'     => $subjectOptions,
            'languageOptions'    => $languageOptions,
            'primarySeparator'   => $this->thword->getSeparatorCharacters(),
            'secondarySeparator' => $this->thword->getSeparatorCharacters(),
            'correctAnswerList'  => $this->thword->getCorrectAnswerList(),
            'maxChoicesList'     => $this->thword->getMaxChoicesList(),
            'thwordData' => array(
                'name'  => $this->name,
                'url'   => $this->url,
                'data'  => $thword->toArray(),
                'field' => $this->fieldMappings
            )
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
        $thword = $this->thword->find($id);

        $parentId      = Input::get('parent_id');
        $categoryId    = Input::get('category_id');
        $subjectId     = Input::get('subject_id');
        $lang          = Input::get('lang');
        $level         = Input::get('level');
        $topic         = Input::get('topic');
        $description   = Input::get('description');
        $answers       = Input::get('answers');
        $correctAnswer = Input::get('correct_answer');
        $maxChoices    = Input::get('max_choices');
        $bonus         = (Input::get('my_checkbox') === '1') ? 1 : 0;
        $bonusQuestion = Input::get('bonus_question');
        $details       = Input::get('details');
        $source        = Input::get('source');
        $notes         = Input::get('notes');

        $thword->parent_id      = (!empty($parentId)) ? $parentId : null;
        $thword->category_id    = isset($categoryId) ? $categoryId : $this->fieldMappings['category_id']['default'];
        $thword->subject_id     = isset($subjectId) ? $subjectId : $this->fieldMappings['subject_id']['default'];
        $thword->lang           = isset($lang) ? $lang : $this->fieldMappings['lang']['default'];
        $thword->level          = isset($level) ? $level : $this->fieldMappings['level']['default'];
        $thword->topic          = isset($topic) ? $topic : $this->fieldMappings['topic']['default'];
        $thword->description    = isset($description) ? $description : $this->fieldMappings['description']['default'];
        $thword->answers        = isset($answers) ? $answers : $this->fieldMappings['answers']['default'];
        $thword->correct_answer = isset($correctAnswer) ? $correctAnswer : $this->fieldMappings['correct_answer']['default'];
        $thword->max_choices    = isset($maxChoices) ? $maxChoices : $this->fieldMappings['max_choices']['default'];
        $thword->bonus          = $bonus;
        $thword->bonus_question = isset($bonusQuestion) ? $bonusQuestion : $this->fieldMappings['bonus_question']['default'];
        $thword->details        = isset($details) ? $details : $this->fieldMappings['details']['default'];
        $thword->source         = isset($source) ? $source : $this->fieldMappings['source']['default'];
        $thword->notes          = isset($notes) ? $notes : $this->fieldMappings['notes']['default'];

        // make sure answers have the correct separator characters
        $primarySeparator = Input::get('primary_separator');
        if ($primarySeparator != \BaseThword::PRIMARY_SEPARATOR) {
            $thword->answers = str_replace($primarySeparator, '|', $thword->answers);
        }
        $secondarySeparator = Input::get('secondary_separator');
        if ($secondarySeparator != \BaseThword::SECONDARY_SEPARATOR) {
            $thword->answers = str_replace($secondarySeparator, '|', $thword->answers);
        }

        if ($success = $thword->save()) {
            //return Redirect::to('/admin/thword');
            Breadcrumbs::addCrumb('Show', '/admin/' . $this->url . '/show');

            $thwArray = $thword->toArray();

            return View::make('admin.' . $this->template . '.show', [
                'successMsg' => $this->name . ' was successfully updated.',
                'thwordData' => array(
                    'name'  => $this->name,
                    'url'   => $this->url,
                    'data'  => $thwArray,
                    'field' => $this->fieldMappings
                )
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
        $this->thword->destroy($id);

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
            'thwordData' => array(
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
