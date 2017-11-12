@extends('main.layouts.layout')

@section('content')

<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href=" {{ route('home') }}">Главная</a></li>
        <li class="active">Вход</li>
    </ol>
</div>

<a href="{{ route('register') }}"><i class="fa fa-user"></i> Регистрация</a>

<h1>Вход</h1>
<br />

<div class="contact-form">
    <form class="form-horizontal col-md-8" role="form" method="post" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="login" class="col-md-2">Логин</label>
            <div class="col-md-10">
                <input type="text" name="login" maxlength="32" placeholder="Логин" required class="form-control" id="login" value="{{ old('login') }}" />
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="col-md-2">Пароль</label>
            <div class="col-md-10">
                <input type="password" class="form-control" id="password" placeholder="Пароль" name="password" minlength="6" maxlength="72" required=""/>
            </div>
        </div>

        <div class="form-group">

            <div class="col-md-10">
                <label><input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить</label>
            </div>
        </div>



        <div class="form-group">
            <div class="col-md-12 text-right">

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Забыли пароль?
                </a>

                <button type="submit" class="btn btn-lg btn-primary">
                    Войти
                </button>

            </div>
        </div>
    </form>
</div>
@endsection
