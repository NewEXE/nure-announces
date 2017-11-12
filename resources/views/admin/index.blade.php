@extends('main.layouts.admin')

@section('title', 'Главная')

@section('content')
<section>
    <div class="container">
        <div class="row">
            
            <br/>
            
            <h4>Добрый день, администратор!</h4>
            
            <br/>
            
            <p>Вам доступны такие возможности:</p>
            
            <br/>
            
            <ul>
                @foreach($items as $route => $label)
                    <li><a href="{{ route($route) }}">{{ $label }}</a></li>
                @endforeach
            </ul>
            
        </div>
    </div>
</section>
@endsection
