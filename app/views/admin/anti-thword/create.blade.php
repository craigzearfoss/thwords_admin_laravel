@extends('layouts.admin')

@section('title') Create Atni-Thword @stop

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

    <h2>
        <i class="fa fa-thwordplay"></i> Create Anti-Thword
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h2>

    {{ Breadcrumbs::render() }}

    {{ Form::open(['role' => 'form', 'url' => '/admin/anti-thword']) }}

    <div class="form-group">
        {{ Form::label('topic', 'Topic') }}
        {{ Form::text('topic', '', ['placeholder' => 'Topic', 'class' => 'form-control']) }}
    </div>

    <div class="form-group" style="display: none;">
        {{ Form::label('expert', 'Expert') }}
        {{ Form::select('expert', $expertOptions, 0, ['class' => 'form-control']) }}
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

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', '', ['placeholder' => 'Description', 'class' => 'form-control']) }}
    </div>

    <div class="form-group" style="display: none;">
        {{ Form::label('bonus', 'Bonus') }}
        {{ Form::checkbox('bonus', 1, false, ['class' => 'form-control']) }}
    </div>

    <div class="form-group" style="display: none;">
        {{ Form::label('bonus_question', 'Bonus Question') }}
        {{ Form::text('bonus_question', '', ['placeholder' => 'Bonus Question', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('answers', 'Answers') }}
        <span class="pull-right" style="display: none;">
            Secondary Separator:
            {{ Form::select('secondary_separator', $secondarySeparator, \Craigzearfoss\ThwordUtil\ThwordUtil::SECONDARY_SEPARATOR, ['class' => '']) }}
        </span>
        <span class="pull-right">
            Primary Separator:
            {{ Form::select('primary_separator', $primarySeparator, \Craigzearfoss\ThwordUtil\ThwordUtil::PRIMARY_SEPARATOR, ['class' => '']) }}
        </span>
        {{ Form::textarea('answers', '', ['placeholder' => 'Answers', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('source', 'Source URL') }}
        {{ Form::text('source', '', ['placeholder' => 'Source URL', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('notes', 'Notes') }}
        {{ Form::textarea('notes', '', ['placeholder' => 'Notes', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ HTML::link('/admin/anti-thword', 'Cancel', ['class' => 'btn btn-primary']) }}
        {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}

</div>

@stop