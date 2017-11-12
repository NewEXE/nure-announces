@extends('main.layouts.layout')

@section('title', 'Просмотр объявления '. $announce->title)

@section('content')


<article>
    <h1>{{ $announce->title }}</h1>

    <div class="row">
        <div class="col-sm-6 col-md-6">
            Добавлено пользователем <b>{{ $announce->user->login }}</b> в:
        </div>
        <div class="col-sm-6 col-md-6">		          		
            &nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span> {{ date('d.m.Y', $announce->created_at->timestamp) }}			          		
        </div>
    </div>

    @can('update', $announce)
    <a href="{{ route('announces.edit', ['id'=>$announce->id]) }}" class="btn btn-primary">Редактировать</a>
    <a href="{{ route('announces.destroy', ['id'=>$announce->id]) }}"
       onclick="event.preventDefault();
       document.getElementById('delete-form').submit();"
       class="btn btn-danger">
       Удалить
    </a>
    <form id="delete-form" action="{{ route('announces.softDelete', ['id'=>$announce->id]) }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @endcan

    <hr>

    <img height="150" width="450" src="{{ $announce->getImageSrc() }}" class="img-responsive">

    <br />

    <p class="lead">Полный текст объявления</p>
    <p>{!! $announce->text !!}</p>
    <hr>
</article>				
@endsection