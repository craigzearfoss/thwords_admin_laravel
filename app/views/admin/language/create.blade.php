@extends('layouts.admin')

@section('title') Create Language @stop

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

    <h2>
        <i class="fa fa-subject"></i> Create Language
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h2>

    {{ Breadcrumbs::render() }}

    {{ Form::open(['role' => 'form', 'url' => '/admin/language']) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('code1', 'Code 1') }}
        {{ Form::text('code1', null, ['placeholder' => 'Code 1', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('code2', 'Code 2') }}
        {{ Form::text('code2', null, ['placeholder' => 'Code 2', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('spoken_in', 'Spoken In') }}
        {{ Form::text('spoken_in', null, ['placeholder' => 'Spoken In', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ HTML::link('/admin/language', 'Cancel', ['class' => 'btn btn-primary']) }}
        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}

</div>

@stop