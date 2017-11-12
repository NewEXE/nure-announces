@extends('main.layouts.admin')

@section('title', 'Редактировать пользователя ' . $user->id)

@section('content')

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.index') }}">Админпанель</a></li>
                    <li><a href="{{ route('admin.users.index') }}">Управление юзерами</a></li>
                    <li class="active">Редактировать юзера</li>
                </ol>
            </div>


            <h4>Редактировать юзера {{ $user->login }} (ID = {{ $user->id }})</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="{{ route('admin.users.update', ['user'=>$user->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <br/><br/>

                        <p>Логин:</p>
                        <input type="text" name="login" placeholder="" value="{{ $user->login }}" />

                        <p>Email:</p>
                        <input type="email" name="email" placeholder="" value="{{ $user->email }}" />


                        <br/><br/>

                        <p>Администратор?</p>

                        @if($user->id == Auth::id())
                            <b>Внимание!</b> Вы редактируете юзера, под которым авторизованы в системе. Если поставиь "Администратор?" - "Нет", доступ к админ-панели сразу же заблокируется. <p class="text-danger">Будьте осторожны.</p>
                        @endif

                        <select name="role">
                            <option value="2" {{ $user->isAdmin() ? 'selected' : '' }}>Да</option>
                            <option value="1" {{ !$user->isAdmin() ? 'selected' : '' }}>Нет</option>
                        </select>

                        <br/><br/>

                        <input type="submit" value="Сохранить" class="btn btn-default">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

