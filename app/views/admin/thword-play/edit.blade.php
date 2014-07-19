@extends('layouts.admin')

@section('title') Edit Thword Play @stop

@section('content')

<div class='col-lg-8 col-lg-offset-4'>

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

    <h1>
        <i class="fa fa-thword"></i> Edit Thword Play
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h1>

    {{ Breadcrumbs::render() }}

    {{ Form::model($thword, ['role' => 'form', 'url' => '/admin/thword-play/' . $thword->id, 'method' => 'PUT']) }}

    <div class="form-group">
        {{ Form::label('topic', 'Topic') }}
        {{ Form::text('topic', null, ['placeholder' => 'Topic', 'class' => 'form-control']) }}
    </div>

    <div class="form-group" style="display: none;">
        {{ Form::label('expert', 'Expert') }}
        {{ Form::select('expert', $expertOptions, null, ['class' => 'form-control']) }}
    </div>

    <div id="category-div" class="form-group">
        {{ Form::label('category_id', 'Category') }}
        {{ Form::select('category_id', $categoryOptions, null, ['class' => 'form-control']) }}
    </div>

    <div id="subject-div" class="form-group">
        {{ Form::label('subject_id', 'Subject') }}
        {{ Form::select('subject_id', $subjectOptions, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('lang', 'Language') }}
        {{ Form::select('lang', $languageOptions, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', null, ['placeholder' => 'Description', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('bonus', 'Bonus Question?') }}
        {{ Form::checkbox('bonus', 1, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('bonus_question', 'Bonus Question Text (optional)') }}
        {{ Form::text('bonus_question', null, ['placeholder' => 'Bonus Question', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('answers', 'Answers') }}
        {{ Form::textarea('answers', null, ['placeholder' => 'Answers', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('source', 'Source URL') }}
        {{ Form::text('source', null, ['placeholder' => 'Source URL', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('notes', 'Notes') }}
        {{ Form::textarea('notes', null, ['placeholder' => 'Notes', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ HTML::link('/admin/thword-play', 'Cancel', ['class' => 'btn btn-primary']) }}
        {{ HTML::link('/admin/thword-play/'.$thword->id.'/show', 'Show', ['class' => 'btn btn-primary']) }}
        {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}

</div>

@stop