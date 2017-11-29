@extends('layouts.app')

@section('content')
<div class="container">

    <div class="panel panel-default" style="height:500px">
@if(Auth::user())
<h1>{{Auth::user()->name}}</h1>
@endif
                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                
</div>
        </div>
@endsection

