@extends('layouts.admin')

@section('title') Edit Category @stop

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

    <h1>
        <i class="fa fa-category"></i> Edit Category
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h1>

    {{ Breadcrumbs::render() }}

    {{ Form::model($category, ['role' => 'form', 'url' => '/admin/category/' . $category->id, 'method' => 'PUT']) }}

    <div class='form-group'>
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) }}
    </div>

    <div class='form-group'>
        {{ HTML::link('/admin/category', 'Cancel', ['class' => 'btn btn-primary']) }}
        {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}

</div>

@stop