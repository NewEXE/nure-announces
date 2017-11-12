@extends('main.layouts.layout')

@section('title', 'Кабинет')

@section('content')
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Главная</a></li>
        <li class="active">Мои объявления</li>
    </ol>
</div>

@if(session('message') == 'create.success')
<div class="alert alert-success alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {!! Lang::get('messages.announce.create.success') !!}.
</div>
@endif

@if(session('message') == 'softDelete.success')
<div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {!! Lang::get('messages.announce.delete.success', ['id'=>session('id')]) !!}.
    <a href="{{ route('announces.restore', ['announce'=>session('id')]) }}"
       onclick="event.preventDefault();
       document.getElementById('restore-form').submit();">
       Восстановить
    </a>
    <form id="restore-form" action="{{ route('announces.restore', ['announce'=>session('id')]) }}" method="post" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>
@endif

@if(session('message') == 'restore.success')
<div class="alert alert-success alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {!! Lang::get('messages.announce.restore.success', ['id'=>session('id')]) !!}.
</div>
@endif

@if(session('message') == 'login.success')
<div class="alert alert-success alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {!! Lang::get('messages.login.success') !!}.
</div>
@endif

<h4>Мои объявления</h4>
<br/>
<a href="{{ route('announces.create') }}"><span class="glyphicon glyphicon-plus"></span> Добавить объявление</a>

<table class="table-bordered table-striped table">
    <tr>
        <th class="width25"></th>
        <th>Заголовок</th>
        <th>Текст</th>
        <th>Дата создания</th>
        <th></th>

    </tr>
    @foreach($announces as $a)
    <tr>
        <td class="width25">
            <a href="{{ route('announces.show', ['id'=>$a->id]) }}"><img class="poster" height="150" width="150" class="img-responsive img-rounded" src="{{ $a->getImageSrc() }}" /></a>
        </td>
        <td><a href="{{ route('announces.show', ['id'=>$a->id]) }}">{{ $a->title }}</a></td>
        <td>{!! $a->text !!}</td>
        <td>{{ date('d.m.Y', $a->created_at->timestamp) }}</td>
        <td>
            <a href="{{ route('announces.edit', ['id'=>$a->id]) }}"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="{{ route('announces.softDelete', ['id'=>$a->id]) }}"
               onclick="event.preventDefault();
                       document.getElementById('delete-form{{ $a->id }}').submit();">
                <span class="glyphicon glyphicon-remove"></span>
            </a>
            <form id="delete-form{{ $a->id }}" action="{{ route('announces.softDelete', ['id'=>$a->id]) }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection