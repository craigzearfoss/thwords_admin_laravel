@extends('layouts.admin')

@section('title') Edit Language @stop

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

    <h1>
        <i class="fa fa-language"></i> Edit Language
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h1>

    {{ Breadcrumbs::render() }}

    {{ Form::model($language, ['role' => 'form', 'url' => '/admin/language/' . $language->id, 'method' => 'PUT']) }}

    <div class='form-group'>
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) }}
    </div>

    <div class='form-group'>
        {{ Form::label('code1', 'Code 1') }}
        {{ Form::text('code1', null, ['placeholder' => 'Code 1', 'class' => 'form-control']) }}
    </div>

    <div class='form-group'>
        {{ Form::label('code1', 'Code 2') }}
        {{ Form::text('code2', null, ['placeholder' => 'Code 2', 'class' => 'form-control']) }}
    </div>

    <div class='form-group'>
        {{ Form::label('spoken_in', 'Spoken In') }}
        {{ Form::textarea('spoken_in', null, ['placeholder' => 'Spoken In', 'class' => 'form-control']) }}
    </div>

    <div class='form-group'>
        {{ HTML::link('/admin/language', 'Cancel', ['class' => 'btn btn-primary']) }}
        {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}

</div>

@stop