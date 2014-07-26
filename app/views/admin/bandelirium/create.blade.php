@extends('layouts.admin')

@section('title') Create {{ $thword['name'] }} @stop

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

    <h2>
        <i class="fa fa-{{ $thword['url'] }}"></i> Create {{ $thword['name'] }}
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h2>

    {{ Breadcrumbs::render() }}

    {{ Form::open(['role' => 'form', 'url' => '/admin/'.$thword['url']]) }}

    <div class="form-group">
        <div class="pull-right" style="width: auto;">
            {{ HTML::link('/admin/'.$thword['name'], 'Cancel', ['class' => 'btn btn-primary']) }}
            {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
        </div>
    </div>

    @if ($thword['field']['parent_id']['display'])
        <div class="form-group">
            {{ Form::label('parent_id', $thword['field']['parent_id']['label']) }}
            {{ Form::text('parent_id', '', ['placeholder' => $thword['field']['parent_id']['label'], 'class' => 'form-control']) }}
        </div>
    @endif

    @if ($thword['field']['category_id']['display'])
        <div class="form-group">
            {{ Form::label('category_id', $thword['field']['category_id']['label']) }}
            {{ Form::select('category_id', $categoryOptions, 4, ['class' => 'form-control']) }}
        </div>
    @endif

    @if ($thword['field']['subject_id']['display'])
        <div class="form-group">
            {{ Form::label('subject_id', $thword['field']['subject_id']['label']) }}
            {{ Form::select('subject_id', $subjectOptions, 2, ['class' => 'form-control']) }}
        </div>
    @endif

    @if ($thword['field']['topic']['display'])
        <div class="form-group">
            {{ Form::label('topic', $thword['field']['topic']['label']) }}
            {{ Form::textarea('topic', null, ['placeholder' => $thword['field']['topic']['label'], 'class' => 'form-control', 'rows' => 3]) }}
        </div>
    @endif

    @if ($thword['field']['description']['display'])
        <div class="form-group">
            {{ Form::label('description', $thword['field']['description']['label']) }}
            {{ Form::text('description', '', ['placeholder' => $thword['field']['description']['label'], 'class' => 'form-control']) }}
        </div>
    @endif

    @if ($thword['field']['lang']['display'])
        <div class="form-group">
            {{ Form::label('lang', $thword['field']['lang']['label']) }}
            {{ Form::select('lang', $languageOptions, 'en', ['class' => 'form-control']) }}
        </div>
    @endif

    @if ($thword['field']['level']['display'])
        <div class="form-group">
            {{ Form::label('level', $thword['field']['level']['label']) }}
            {{ Form::select('level', $levelOptions, 0, ['class' => 'form-control']) }}
        </div>
    @endif

    @if ($thword['field']['answers']['display'])
        <div class="form-group">
            {{ Form::label('answers', $thword['field']['answers']['label']) }}
            <span class="pull-right" style="display: none;">
                Secondary Separator:
                {{ Form::select('secondary_separator', $secondarySeparator, \Craigzearfoss\ThwordUtil\ThwordUtil::SECONDARY_SEPARATOR, ['class' => '']) }}
            </span>
            <span class="pull-right">
                Separator:
                {{ Form::select('primary_separator', $primarySeparator, \Craigzearfoss\ThwordUtil\ThwordUtil::PRIMARY_SEPARATOR, ['class' => '']) }}
            </span>
            {{ Form::textarea('answers', '', ['placeholder' => $thword['field']['answers']['label'], 'class' => 'form-control']) }}
        </div>
    @endif

    @if ($thword['field']['correct_answer']['display'])
        <div class="form-group">
            {{ Form::label('correct_answer', $thword['field']['correct_answer']['label']) }}
            {{ Form::select('correct_answer', $correctAnswerList, 1, ['class' => 'form-control']) }}
        </div>
    @endif

    @if ($thword['field']['max_choices']['display'])
        <div class="form-group">
            {{ Form::label('max_choices', $thword['field']['max_choices']['label']) }}
            {{ Form::select('max_choices', $maxChoicesList, \Craigzearfoss\ThwordUtil\ThwordUtil::DEFAULT_MAX_CHOICES, ['class' => '']) }}
        </div>
    @endif

    @if ($thword['field']['bonus']['display'])
        <div class="form-group">
            {{ Form::label('bonus', $thword['field']['bonus']['label']) }}
            {{ Form::checkbox('bonus', 1, false, ['class' => 'form-control']) }}
        </div>
    @endif

    @if ($thword['field']['bonus_question']['display'])
        <div class="form-group" style="display: none;">
            {{ Form::label('bonus_question', $thword['field']['bonus_question']['label']) }}
            {{ Form::text('bonus_question', '', ['placeholder' => $thword['field']['bonus_question']['label'], 'class' => 'form-control']) }}
        </div>
    @endif

    @if ($thword['field']['details']['display'])
        <div class="form-group">
            {{ Form::label('details', $thword['field']['details']['label']) }}
            {{ Form::textarea('details', '', ['placeholder' => $thword['field']['details']['label'], 'class' => 'form-control']) }}
        </div>
    @endif

    @if ($thword['field']['source']['display'])
        <div class="form-group">
            {{ Form::label('source', $thword['field']['source']['label']) }}
            {{ Form::text('source', '', ['placeholder' => $thword['field']['source']['label'], 'class' => 'form-control']) }}
        </div>
    @endif

    @if ($thword['field']['notes']['display'])
        <div class="form-group">
            {{ Form::label('notes', $thword['field']['notes']['label']) }}
            {{ Form::textarea('notes', '', ['placeholder' => $thword['field']['notes']['label'], 'class' => 'form-control']) }}
        </div>
    @endif

    {{ Form::close() }}

</div>

@stop