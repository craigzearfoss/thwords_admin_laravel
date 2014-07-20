@extends('layouts.admin')

@section('title') Show Category @stop

@section('content')

<div class='col-lg-8 col-lg-offset-2'>

    @if (!empty($successMsg))
        <div class='bg-success alert'>{{ $successMsg }}</div>
    @endif

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

    <h2>
        <i class="fa fa-thword"></i> Show Category
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h2>

    {{ Breadcrumbs::render() }}

    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>{{ $category->name }}</td>
                </tr>
                <tr>
                    <td>Subjects</td>
                    <td>
                        @foreach ($subjects as $subject)
                            <li>{{ $subject->name }}</li>
                        @endforeach
                    </td>
                </tr>
       </tbody>
        </table>
    </div>

    <div class="form-group">
        {{ HTML::link('/admin/category', 'Back', ['class' => 'btn btn-primary']) }}
        {{ HTML::link('/admin/category/'.$category->id.'/edit', 'Edit', ['class' => 'btn btn-primary']) }}    </div>

    {{ Form::close() }}

</div>

@stop