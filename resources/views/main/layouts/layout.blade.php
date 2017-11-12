<?php if(!isset($pages)) $pages = App\Page::all(); ?>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>	
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A Bootstrap Blog Template">
        <meta name="author" content="Vijaya Anand">

        <title>@yield('title')</title>

        <!-- Bootstrap CSS file -->
        <link href="{{ asset('main/lib/bootstrap-3.0.3/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href=" {{ asset('main/lib/bootstrap-3.0.3/css/bootstrap-theme.min.css') }} " rel="stylesheet" />
        <link href=" {{ asset('main/blog.css') }}" rel="stylesheet" />
        <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>

    </head>

    <body>
        <!-- Header -->
        @section('header')
        <header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">			
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Навигация</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{ url('/') }}" class="navbar-brand">{{ config('app.name') }}</a>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                    <form action="{{ route('pages.search') }}" method="get" class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" name="s" class="form-control" placeholder="Поиск...">
                        </div>
                        <button type="submit" class="btn btn-default">Поиск</button>
                    </form>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('home') }}">Главная</a></li>
                        @if(!Auth::check())
                        <li><a href="{{ url('register') }}">Регистрация</a></li>
                        <li><a href="{{ route('login') }}">Вход</a></li>
                        @else
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                Выход
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @endif
                        <li><a href="{{ url('announces/create') }}">Добавить статью</a></li>
                        @can('create', App\Page::class)
                        <li class="active"><a href="{{ route('admin.index') }}">Админка</a></li>
                        @endcan
                    </ul>
                </nav>
            </div>
        </header>
        @show

        <!-- Body -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if(count($errors) > 0)
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Обнаружены следующие ошибки:
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @yield('content')
                </div>
                <div class="col-md-4">

                    @section('sidebar')
                    <div class="well text-center">
                        <p class="lead">
                            {{ Lang::get('labels.block1.title') }}
                        </p>
                        <p>{{ Lang::get('labels.block1.text') }}</p>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><span class="glyphicon glyphicon-paperclip"></span> Страницы</h4>
                        </div>
                        @if(isset($pages))
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{ route('pages.index') }}">Все страницы сайта</a></li>
                            @foreach($pages as $page)
                            <li class="list-group-item"><a href="{{ route('pages.page', ['alias'=>$page->alias]) }}">{{ $page->title }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </div>

                    @if(!Auth::check())
                    <div class="well text-center">
                        <p class="lead">
                            <span class="glyphicon glyphicon-user"></span> Вход / Регистрация
                        </p>
                        <p>Займёт не более одной минуты</p>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Вход</a>
                        <a href="{{ url('register') }}" class="btn btn-primary btn-lg">Регистрация</a>
                    </div>
                    @else
                    <div class="well text-center">
                        <p class="lead">
                            <span class="glyphicon glyphicon-folder-open"></span> Мои объявления
                        </p>
                        <p>Перейти в мои объявления</p>
                        <a href="{{ route('announces.index') }}" class="btn btn-primary btn-lg">Управление</a>
                    </div>
                    @endif

                    <!-- Latest Posts -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><span class="glyphicon glyphicon-list-alt"></span> Последние объявления</h4>
                        </div>
                        <ul class="list-group">
                            <!-- <li class="list-group-item"><a href="">1. Страница 1</a></li> -->
                        </ul>
                    </div>

                    <!-- Categories -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><span class="glyphicon glyphicon-heart-empty"></span> Используемые технологии</h4>
                        </div>

                        <ul class="list-group">
                            <li class="list-group-item"><a href="http://php.net"><span class="glyphicon glyphicon-heart"></span> PHP 7</a></li>
                            <li class="list-group-item"><a href=""><span class="glyphicon glyphicon-list-alt"></span> Laravel 5.4</a></li>
                            <li class="list-group-item"><a href="https://www.mysql.com/"><span class="glyphicon glyphicon-book"></span> MySQL 5.7</a></li>
                            <li class="list-group-item"><a href="http://getbootstrap.com"><span class="glyphicon glyphicon-phone"></span> Bootstrap 3</a></li>
                            <li class="list-group-item"><a href="http://ashep.org/2013/mvc-pattern-php-1/"><span class="glyphicon glyphicon-cog"></span> MVC Pattern</a></li>
                            <li class="list-group-item"><a href="https://httpd.apache.org/"><span class="glyphicon glyphicon-hdd"></span> Apache</a></li>

                        </ul>
                    </div>
                    @show
                </div>
            </div>
        </div>

        <!-- Footer -->
        @section('footer')
        <footer>
            <div class="container">
                <hr />
                <p class="text-center">Copyright &copy; {{ config('app.name') }}, {{ date('Y') }} </p>
            </div>
        </footer>
        @show

        <!-- Jquery and Bootstrap Script files -->
        <script src="{{ asset('main/lib/jquery-2.0.3.min.js') }}"></script>
        <script src="{{ asset('main/lib/bootstrap-3.0.3/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/upload-images.js') }}"></script>

    </body>
</html>