@extends('main.layouts.layout')

@section('title', 'Поиск: ' . $searchString)

@section('content')
<section>
    <h4>Поиск по объявлениям</h4>

    <h5>Запрос: {{ $searchString }}</h5>

    <br/>

    <table class="table-bordered table-striped table">
        <tr>
            <th class="width25"></th>
            <th>ID</th>
            <th>Заголовок</th>
            <th>Текст</th>
            <th>Дата создания</th>

        </tr>
        @foreach($announces as $a)
            <tr>
                <td class="width25">
                    <img class="poster" height="150" width="150" class="img-responsive img-rounded" src="{{ $a->getImageSrc() }}" alt="{{ $a->title }}"/>              
                </td>
                <td>{{ $a->id }}</td>
                <td><a href="">{{ $a->title }}</a></td>
                <td>{!! $a->text !!}</td>
                <td>{{ date('d.m.Y', $a->created_at->timestamp) }}</td>
            </tr>
        @endforeach
    </table>
</section>			
@endsection