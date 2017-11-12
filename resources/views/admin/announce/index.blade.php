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
                    <li class="active">Управление объявлениями</li>
                </ol>
            </div>

            <a href="{{ route('admin.announces.create') }}" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить объявление</a>

            <h4>Список объявлений <!-- if($user_id) echo "юзера " . User::getUsernameById($user_id) --></h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th class="width25"></th>
                    <th>Добавил</th>
                    <th>Заголовок</th>
                    <th>Текст</th>
                    <th>Дата создания</th>
                    <th>В корзине?</th>
                    <th>Действия</th>

                </tr>
                @foreach($announces as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td class="width25">
                        <img class="poster" height="150" width="150" class="img-responsive img-rounded" src="{{ $a->getImageSrc() }}" /></td>
                    <td>{{ $a->user->login }}</td>
                    <td><a href="{{ route('admin.announces.show', ['announce'=>$a->id]) }}">{{ $a->title }}</a></td>
                    <td>{!! $a->text !!}</td>
                    <td>{{ date('d.m.Y', $a->created_at->timestamp) }}</td>
                    <td>{!! $a->trashed() ? '<b><i>да</i></b>' : 'нет' !!}</td>
                    <td>
                        <a href="{{ route('admin.announces.edit', ['id'=>$a->id]) }}" title="Редактировать"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('admin.announces.destroy', ['id'=>$a->id]) }}"
                           onclick="event.preventDefault();
                                       document.getElementById('delete-form{{ $a->id }}').submit();">
                            <i class="fa fa-times"></i>
                            <form id="delete-form{{ $a->id }}" action="{{ route('admin.announces.destroy', ['id'=>$a->id]) }}" method="POST" style="display: none;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
</section>

@endsection