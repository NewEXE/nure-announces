@extends('main.layouts.admin')

@section('title', 'Все пользователи')

@section('content')

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление юзерами</li>
                </ol>
            </div>

            <a href="{{ route('register') }}" target="_blank" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить юзера <i class="fa fa-external-link"></i></a>

            <h4>Список юзеров</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Объявления</th>
                    <th>Администратор?</th>
                    <th>Ред./Удалить</th>
                </tr>
                @foreach ($users as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->login }}</td>
                    <td>{{ $u->email }}</td>
                    <td><a href="" title="Найти все объявления юзера"><i class="fa fa-search"></i> Найти</a></td>
                    <td>{{ $u->isAdmin() ? 'Да' : 'Нет' }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', ['user'=>$u->id]) }}" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a>
                        <a href="{{ route('admin.users.destroy', ['id'=>$u->id]) }}"
                           onclick="event.preventDefault();
                                       document.getElementById('delete-form{{ $u->id }}').submit();">
                            <span class="glyphicon glyphicon-remove"></span>
                            <form id="delete-form{{ $u->id }}" action="{{ route('admin.users.destroy', ['id'=>$u->id]) }}" method="POST" style="display: none;">
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