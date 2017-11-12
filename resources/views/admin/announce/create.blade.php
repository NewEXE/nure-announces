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
                    <li class="active">@yield('title')</li>
                </ol>
            </div>


            <h4>Добавить новое объявление</h4>

            <br/>

            <!--
            <?php //if (isset($errors) && is_array($errors)): ?>
                <ul>
            <?php // foreach ($errors as $error): ?>
                        <li> - <?php // echo $error;  ?></li>
            <?php // endforeach; ?>
                </ul>
            <?php // endif; ?>
            -->

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="{{ route('admin.announces.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <p>Заголовок</p>
                        <input type="text" name="title" placeholder="" value="">

                        <p>Изображение ({{ implode(', ', App\Announce::EXTENSIONS) }})</p>
                        <input type="file" id="image" name="image" placeholder="" value="">
                        <div id="list-images"></div>

                        <p>Текст объявления</p>
                        <textarea id="editor" name="text"></textarea>

                        <br/><br/>

                        <p>В корзине?</p>
                        <select name="inTrash">
                            <option value="0" selected="selected">Нет</option>
                            <option value="1">Да</option>
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

