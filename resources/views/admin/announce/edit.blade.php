@extends('main.layouts.admin')

@section('title', 'Добавить объявление')

@section('content')

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.index') }}">Админпанель</a></li>
                    <li><a href="{{ route('admin.announces.index') }}">Управление объявлениями</a></li>
                    <li class="active">Редактировать объявление</li>
                </ol>
            </div>


            <h4>Редактировать объявление №{{ $announce->id }}</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="{{ route('admin.announces.update', ['announce'=>$announce->id]) }}" method="post" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <p>Заголовок</p>
                        <input type="text" name="title" placeholder="" value="{{ $announce->title }}">

                        <p>Изображение ({{ implode(', ', App\Announce::EXTENSIONS) }})</p>
                        <input type="file" id="image" name="image" placeholder="" value="">
                        <div id="list-images"></div>

                        <p>Текст объявления</p>
                        <textarea id="editor" name="text">{{ $announce->text }}</textarea>

                        <br/><br/>

                        <p>В корзине?</p>
                        <select name="inTrash">
                            <option value="0" {{ $announce->trashed() ?: 'selected' }}>Нет</option>
                            <option value="1" {{ $announce->trashed() ? 'selected' : '' }}>Да</option>
                        </select>

                        <br/><br/>

                        <input type="submit" class="btn btn-default" value="Добавить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    CKEDITOR.replace('editor');
</script>

@endsection

