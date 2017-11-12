@extends('main.layouts.admin')

@section('title', 'Все объявления')

@section('content')

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.index') }}">Админ-панель</a></li>
                    <li class="active">Управление страницами</li>
                </ol>
            </div>

            <!--
            <a href="{{ route('admin.announces.create') }}" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить объявление</a>
            -->

            <h4>Список страниц сайта</h4>

            <p>Будет реализовано с помощью стороннего CRUD-генератора...</p>
            
            <br/>

           
        </div>
    </div>
</section>

@endsection