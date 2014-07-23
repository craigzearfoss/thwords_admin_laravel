@extends('layouts.admin')

@section('title') Create Thword @stop

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

    <h2>
        <i class="fa fa-thword"></i> Create Thword
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h2>

    {{ Breadcrumbs::render() }}

    {{ Form::open(['role' => 'form', 'url' => '/admin/thword']) }}

    <div class="form-group">
        <div class="pull-right" style="width: auto;">
            {{ HTML::link('/admin/thword', 'Cancel', ['class' => 'btn btn-primary']) }}
            {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('topic', 'Term') }}
        {{ Form::text('topic', '', ['placeholder' => 'Term', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Definition') }}
        {{ Form::text('description', '', ['placeholder' => 'Definition', 'class' => 'form-control']) }}
    </div>

    <div class="form-group" style="display: none;">
        {{ Form::label('category_id', 'Category') }}
        {{ Form::select('category_id', $categoryOptions, 99, ['class' => 'form-control']) }}
    </div>

    <div class="form-group" style="display: none;">
        {{ Form::label('subject_id', 'Subject') }}
        {{ Form::select('subject_id', $subjectOptions, 999, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('lang', 'Language') }}
        {{ Form::select('lang', $languageOptions, 'en', ['class' => 'form-control']) }}
    </div>

    <div class="form-group" style="display: none;">
        {{ Form::label('level', 'Level') }}
        {{ Form::text('level', '0', ['placeholder' => '', 'class' => 'form-control']) }}
        <?php /*{{ Form::select('level', $levelOptions, 0, ['class' => 'form-control']) }} */ ?>
    </div>

    <div class="form-group" style="display: none;">
        {{ Form::label('bonus', 'Bonus') }}
        {{ Form::checkbox('bonus', 1, false, ['class' => 'form-control']) }}
    </div>

    <div class="form-group" style="display: none;">
        {{ Form::label('bonus_question', 'Bonus Question') }}
        {{ Form::text('bonus_question', '', ['placeholder' => 'Bonus Question', 'class' => 'form-control']) }}
    </div>

    <div class="form-group" style="display: none;">
        {{ Form::label('correct_answer', 'Correct Answer') }}
        {{ Form::select('correct_answer', $correctAnswerList, 0, ['class' => 'form-control']) }}
    </div>

    <div class="form-group" style="display: none;">
        {{ Form::label('max_choices', 'Max Choices') }}
        {{ Form::select('max_choices', $maxChoicesList, \Craigzearfoss\ThwordUtil\ThwordUtil::DEFAULT_MAX_CHOICES, ['class' => '']) }}
    </div>

    <div class="form-group">
        {{ Form::label('answers', 'Synonyms') }}
        <span class="pull-right" style="display: none;">
            Secondary Separator:
            {{ Form::select('secondary_separator', $secondarySeparator, \Craigzearfoss\ThwordUtil\ThwordUtil::SECONDARY_SEPARATOR, ['class' => '']) }}
        </span>
        <span class="pull-right">
            Separator:
            {{ Form::select('primary_separator', $primarySeparator, \Craigzearfoss\ThwordUtil\ThwordUtil::PRIMARY_SEPARATOR, ['class' => '']) }}
        </span>
        {{ Form::textarea('answers', '', ['placeholder' => 'Synonyms', 'class' => 'form-control']) }}
    </div>

    <div class="form-group" style="display: none;">
        {{ Form::label('details', 'Details (Shown when answer is displayed.)') }}
        {{ Form::textarea('details', '', ['placeholder' => 'Details', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('source', 'Source URL') }}
        {{ Form::text('source', '', ['placeholder' => 'Source URL', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('notes', 'Notes') }}
        {{ Form::textarea('notes', '', ['placeholder' => 'Notes', 'class' => 'form-control']) }}
    </div>

    {{ Form::close() }}

</div>

@stop