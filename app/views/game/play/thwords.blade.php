@extends('layouts.app')

@section('title') Play Thwords @stop

@section('content')

<div id="container-header">
    <header id="masthead" class="wrapper">
        <h3>Thwords &reg;</h3>
    </header>
</div>

<div ng-controller="playController" id="container-content">
    <article class="start-page" ng-class="{ 'hidden': ! showStart }" id="content-start">
        <button ng-click="startPlay()" class="nav-btn start">START</button>
        <a href="/home">Back</a>
    </article>
    <article class="main-page" ng-class="{ 'hidden': ! showMain }" id="content">
        HERE WE GO
    </article>
    <article class="post-page" ng-class="{ 'hidden': ! showPost }" id="content-stats">
        DONE
    </article>
    <article class="stats-page" ng-class="{ 'hidden': ! showStats }" id="content-stats">
        STATS
    </article>
</div>

@stop
