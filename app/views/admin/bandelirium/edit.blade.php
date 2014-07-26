@extends('layouts.admin')

@section('title') Edit {{ $thwordData['name'] }} @stop

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

    <h2>
        <i class="fa fa-{{ $thwordData['url'] }}"></i> Edit {{ $thwordData['name'] }}
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h2>

    {{ Breadcrumbs::render() }}

    {{ Form::model($thword, ['role' => 'form', 'url' => '/admin/' . $thwordData['url'] . '/' . $thword->id, 'method' => 'PUT']) }}

    <div class="form-group">
        <div class="pull-right" style="width: auto;">
            {{ HTML::link('/admin/'.$thwordData['url'], 'Cancel', ['class' => 'btn btn-primary']) }}
            {{ HTML::link('/admin/'.$thwordData['url'].'/'.$thword->id.'/show', 'Show', ['class' => 'btn btn-primary']) }}
            {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
        </div>
    </div>

    @if ($thwordData['field']['parent_id']['display'])
        <div class="form-group">
            {{ Form::label('parent_id', $thwordData['field']['parent_id']['label']) }}
            {{ Form::text('parent_id', null, ['placeholder' => $thwordData['field']['parent_id']['label'], 'class' => 'form-control']) }}
        </div>
    @endif

    @if ($thwordData['field']['category_id']['display'])
        <div class="form-group">
            {{ Form::label('category_id', $thwordData['field']['category_id']['label']) }}
            {{ Form::select('category_id', $categoryOptions, null, ['class' => 'form-control']) }}
        </div>
    @endif

    @if ($thwordData['field']['subject_id']['display'])
        <div class="form-group">
            {{ Form::label('subject_id', $thwordData['field']['subject_id']['label']) }}
            {{ Form::select('subject_id', $subjectOptions, null, ['class' => 'form-control']) }}
        </div>
    @endif

    @if ($thwordData['field']['lang']['display'])
        <div class="form-group">
            {{ Form::label('lang', $thwordData['field']['lang']['label']) }}
            {{ Form::select('lang', $languageOptions, null, ['class' => 'form-control']) }}
        </div>
    @endif

    @if ($thwordData['field']['level']['display'])
        <div class="form-group">
            {{ Form::label('level', $thwordData['field']['level']['label']) }}
            {{ Form::select('level', $levelOptions, null, ['class' => 'form-control']) }}
        </div>
    @endif

    @if ($thwordData['field']['topic']['display'])
        <div class="form-group">
            {{ Form::label('topic', $thwordData['field']['topic']['label']) }}
            {{ Form::textarea('topic', null, ['placeholder' => $thwordData['field']['topic']['label'], 'class' => 'form-control', 'rows' => 3]) }}
        </div>
    @endif

    @if ($thwordData['field']['description']['display'])
        <div class="form-group">
            {{ Form::label('description', $thwordData['field']['description']['label']) }}
            {{ Form::text('description', null, ['placeholder' => $thwordData['field']['description']['label'], 'class' => 'form-control']) }}
        </div>
    @endif

    @if ($thwordData['field']['answers']['display'])
        <div class="form-group">
            {{ Form::label('answers', $thwordData['field']['answers']['label']) }}
            <span class="pull-right">
                Secondary Separator:
                {{ Form::select('secondary_separator', $secondarySeparator, \Craigzearfoss\ThwordUtil\ThwordUtil::SECONDARY_SEPARATOR, ['class' => '']) }}
            </span>
            <span class="pull-right">
                Separator:
                {{ Form::select('primary_separator', $primarySeparator, \Craigzearfoss\ThwordUtil\ThwordUtil::PRIMARY_SEPARATOR, ['class' => '']) }}
            </span>
            {{ Form::textarea('answers', null, ['placeholder' => $thwordData['field']['answers']['label'], 'class' => 'form-control']) }}
        </div>
    @endif

    @if ($thwordData['field']['correct_answer']['display'])
        <div class="form-group">
            {{ Form::label('correct_answer', $thwordData['field']['correct_answer']['label']) }}
            {{ Form::select('correct_answer', $correctAnswerList, null, ['class' => 'form-control']) }}
        </div>
    @endif

    @if ($thwordData['field']['max_choices']['display'])
        <div class="form-group">
            {{ Form::label('max_choices', $thwordData['field']['max_choices']['label']) }}
            {{ Form::select('max_choices', $maxChoicesList, null, ['class' => '']) }}
        </div>
    @endif

    @if ($thwordData['field']['bonus']['display'])
        <div class="form-group">
            {{ Form::label('bonus', $thwordData['field']['bonus']['label']) }}
            {{ Form::checkbox('bonus', 1, null, ['class' => 'form-control']) }}
        </div>
    @endif

    @if ($thwordData['field']['bonus_question']['display'])
        <div class="form-group">
            {{ Form::label('bonus_question', $thwordData['field']['bonus_question']['label']) }}
            {{ Form::text('bonus_question', null, ['placeholder' => 'Bonus Question', 'class' => 'form-control']) }}
        </div>
    @endif

    @if ($thwordData['field']['details']['display'])
        <div class="form-group">
            {{ Form::label('details', $thwordData['field']['details']['label']) }}
            {{ Form::textarea('details', null, ['placeholder' => $thwordData['field']['details']['label'], 'class' => 'form-control']) }}
        </div>
    @endif

    @if ($thwordData['field']['source']['display'])
        <div class="form-group">
            {{ Form::label('source', $thwordData['field']['source']['label']) }}
            {{ Form::text('source', null, ['placeholder' => $thwordData['field']['source']['label'], 'class' => 'form-control']) }}
        </div>
    @endif

    @if ($thwordData['field']['notes']['display'])
        <div class="form-group">
            {{ Form::label('notes', $thwordData['field']['notes']['label']) }}
            {{ Form::textarea('notes', null, ['placeholder' => $thwordData['field']['notes']['label'], 'class' => 'form-control']) }}
        </div>
    @endif

    {{ Form::close() }}

</div>

@stop