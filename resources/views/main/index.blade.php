@extends('main.layouts.layout')

@section('title', 'Это индекс')

@section('content')

@if(session('message') == 'logout.success')
    <div class="alert alert-info alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {!! Lang::get('messages.logout.success') !!}.
    </div>
@endif

<div class="well">Тестовые данные администратора:<br>
    Логин: <b>admin</b> <br>
    Пароль: <b>admin1</b>
</div>

<h2>{{ Lang::get('labels.pages.main.h1') }}</h2>

<div class="row">
@foreach ($announces as $a)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a href="{{ route('announces.show', ['id'=>$a->id]) }}"><img src="{{ $a->getImageSrc() }}" height="200" width="300" alt=""></a>
      <div class="caption">
        <h3>{{ $a->title }}</h3>
        <p>{!! $a->text !!}</p>
        <p><a href="{{ route('announces.show', ['id'=>$a->id]) }}" class="btn btn-default center-block" role="button">Просмотр</a>
      </div>
    </div>
  </div>
@endforeach
</div>
@endsection