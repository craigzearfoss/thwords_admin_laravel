@extends('layouts.admin')

@section('title') Admin Home @stop

@section('content')

<div class="col-md-4 col-md-offset-4">

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

    <h2>
        <i class="fa fa-home"></i> Admin Home
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right')) }}
    </h2>

    {{ Breadcrumbs::render() }}

    <div class="panel panel-info">
        <div class="panel-heading">Admin Menu</div>
        <div class="panel-body">

            <ul class="nav nav-pills nav-stacked">
                <li>{{ HTML::link('/admin/anti-thword', 'Anti-Thwords', array()) }}</li>
                <li>{{ HTML::link('/admin/foreign-thword', 'Foreign Thwords', array()) }}</li>
                <li>{{ HTML::link('/admin/thword', 'Thwords', array())}}</li>
                <li>{{ HTML::link('/admin/thword-play', 'Thword Plays', array()) }}</li>
                <li>{{ HTML::link('/admin/q-thword', 'Q-Thwords', array()) }}</li>
                <li>{{ HTML::link('/admin/bandelirium', 'Bandeliriums', array()) }}</li>
            </ul>
            <ul class="nav nav-pills nav-stacked">
                <li>{{ HTML::link('/admin/category', 'Categories', array()) }}</li>
                <li>{{ HTML::link('/admin/language', 'Languages', array()) }}</li>
                <li>{{ HTML::link('/admin/result', 'Results', array()) }}</li>
                <li>{{ HTML::link('/admin/subject', 'Subjects', array()) }}</li>
            </ul>

            <ul class="nav nav-pills nav-stacked">
                <li>{{ HTML::link('/admin/user', 'Users', array()) }}</li>
            </ul>

        </div>
    </div>
</div>

@stop