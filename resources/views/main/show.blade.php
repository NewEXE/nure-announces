@extends('main.layouts.layout')

@section('title', $page->title)

@section('content')
<article>
    <h1>{{ $page->title }}</h1>

    <div class="row">
        <div class="col-sm-6 col-md-6">
            Добавлено пользователем <b>x</b> в:
        </div>
        <div class="col-sm-6 col-md-6">		          		
            &nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span> <?= date('d.m.Y', $page->created_at->timestamp) ?>			          		
        </div>
    </div>

        <a href="/announce/edit?id=" class="btn btn-primary">Редактировать</a>
        <a href="/announce/delete?id=" class="btn btn-danger">Удалить</a>

    <hr>

    <img height="150" width="450" src="" class="img-responsive">

    <br />

    <p class="lead">Содержимое страницы</p>
    <p>{{ $page->content }}</p>
    <hr>
</article>				
@endsection