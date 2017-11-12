@extends('main.layouts.layout')

@section('title', 'Добавить объявление')

@section('content')

<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Главная</a></li>
        <li class="active">Добавить объявление</li>
    </ol>
</div>

@if(count($errors) > 0)
<div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <ul>
        @foreach($errors->all() as $e)
        <li>
            {{ $e }}
        </li>
        @endforeach
    </ul>
</div>
@endif

<h4>Добавить объявление</h4>

<br/>

<div class="contact-form">
    <form method="post" action="{{ route('announces.store') }}" class="form-horizontal col-md-12" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="image" class="col-md-2">Изображение (необязательно, {{ implode(', ', App\Announce::EXTENSIONS) }})</label>
            <div class="col-md-5">
                <input type="file" name="image" placeholder="Выберите файл..." class="form-control" id="image" />
            </div>
            <div class="col-md-5">
                <div id="list-images"></div>
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="col-md-2">Заголовок</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="title" placeholder="Заголовок объявления" name="title" value="{{ old('title') }}" required />
            </div>
        </div>

        <div class="form-group">
            <label for="text" class="col-md-2">Текст объявления</label>
            <div class="col-md-10">
                <textarea id="editor" name="text" class="form-control" id="text" placeholder="Введите полный текст объявления..." name="text" required>{{ old('text') }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-lg btn-primary">Добавить</button>
            </div>
        </div>
    </form>	
</div>

<script>
    CKEDITOR.replace('editor');
</script>

@endsection