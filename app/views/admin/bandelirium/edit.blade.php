@extends('layouts.admin')

@section('title') Edit Bandelirium @stop

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

    <h2>
        <i class="fa fa-bandelirium"></i> Edit Bandelirium
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h2>

    {{ Breadcrumbs::render() }}

    {{ Form::model($thword, ['role' => 'form', 'url' => '/admin/bandelirium/' . $thword->id, 'method' => 'PUT']) }}

    <div class="form-group">
        <div class="pull-right" style="width: auto;">
            {{ HTML::link('/admin/bandelirium', 'Cancel', ['class' => 'btn btn-primary']) }}
            {{ HTML::link('/admin/bandelirium/'.$thword->id.'/show', 'Show', ['class' => 'btn btn-primary']) }}
            {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('parent_id', 'Parent ID') }}
        {{ Form::text('parent_id', null, ['placeholder' => 'Parent ID', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('topic', 'Question') }}
        {{ Form::textarea('topic', null, ['placeholder' => 'Question', 'class' => 'form-control', 'rows' => 3]) }}
    </div>

    <div class="form-group" style="display: none;">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', null, ['placeholder' => 'Description', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('category_id', 'Category') }}
        {{ Form::select('category_id', $categoryOptions, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('subject_id', 'Subject') }}
        {{ Form::select('subject_id', $subjectOptions, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group" style="display: none;">
        {{ Form::label('lang', 'Language') }}
        {{ Form::select('lang', $languageOptions, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group" style="display: none;">
        {{ Form::label('level', 'Level') }}
        {{ Form::text('level', null, ['placeholder' => '', 'class' => 'form-control']) }}
        <?php /*{{ Form::select('level', $levelOptions, null, ['class' => 'form-control']) }} */ ?>
    </div>

    <div class="form-group" style="display: none;">
        {{ Form::label('bonus', 'Bonus') }}
        {{ Form::checkbox('bonus', 1, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group" style="display: none;">
        {{ Form::label('bonus_question', 'Bonus Question') }}
        {{ Form::text('bonus_question', null, ['placeholder' => 'Bonus Question', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('correct_answer', 'Correct Answer') }}
        {{ Form::text('correct_answer', null, ['placeholder' => 'Correct Answer', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('max_choices', 'Max Choices') }}
        {{ Form::select('max_choices', $maxChoicesList, null, ['class' => '']) }}
    </div>

    <div class="form-group">
        {{ Form::label('answers', 'Answer(s)') }}
        <span class="pull-right" style="display: none;">
            Secondary Separator:
            {{ Form::select('secondary_separator', $secondarySeparator, \Craigzearfoss\ThwordUtil\ThwordUtil::SECONDARY_SEPARATOR, ['class' => '']) }}
        </span>
        <span class="pull-right">
            Separator:
            {{ Form::select('primary_separator', $primarySeparator, \Craigzearfoss\ThwordUtil\ThwordUtil::PRIMARY_SEPARATOR, ['class' => '']) }}
        </span>
        {{ Form::textarea('answers', null, ['placeholder' => 'Synonyms', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('details', 'Details (Shown when answer is displayed.)') }}
        {{ Form::textarea('details', null, ['placeholder' => 'Details', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('source', 'Source URL') }}
        {{ Form::text('source', null, ['placeholder' => 'Source URL', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('notes', 'Notes') }}
        {{ Form::textarea('notes', null, ['placeholder' => 'Notes', 'class' => 'form-control']) }}
    </div>

    {{ Form::close() }}

</div>

@stop