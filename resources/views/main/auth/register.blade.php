@extends('main.layouts.layout')

@section('content')
<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Главная</a></li>
        <li class="active">Регистрация</li>
    </ol>
</div>

<a href="{{ route('login') }}"><i class="fa fa-user"></i> Вход</a>

<h1>Регистрация</h1>

<div class="well">
    <p class="lead">
        Все поля обязательны для заполнения!
    </p>
</div>
<div class="contact-form">
    <form class="form-horizontal col-md-8" role="form" method="post" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="login" class="col-md-2">Логин</label>
            <div class="col-md-10">
                <input type="text" name="login" maxlength="32" placeholder="Логин" required class="form-control" id="login" />
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="col-md-2">Пароль</label>
            <div class="col-md-10">
                <input type="password" class="form-control" id="password" placeholder="Пароль" name="password" minlength="6" maxlength="72" required=""/>
            </div>
        </div>
        
        <div class="form-group">
            <label for="password-confirm" class="col-md-2">Повторите пароль</label>
            <div class="col-md-10">
                <input type="password" class="form-control" id="password-confirm" placeholder="Пароль" name="password_confirmation" minlength="6" maxlength="72" required=""/>
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-md-2">Email</label>
            <div class="col-md-10">
                <input type="email" class="form-control" id="password" placeholder="E-mail" name="email" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-lg btn-primary">Регистрация</button>
            </div>
        </div>
    </form>	
</div>
@endsection
