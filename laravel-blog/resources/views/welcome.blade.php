@extends('layouts.app')

@section('content')
    <div class="welcome-text">
        <p>Добро пожаловать на ресурс %RESOURCE_NAME%.</p>
        <p>Чтобы получить доступ к блогам и постам наших пользователей, вам нужно пройти авторизацию.</p>
    </div>

    <div class="auth-buttons">
        <a href="{{ route('login') }}" class="btn btn-primary">Авторизация</a>
        <a href="{{ route('register') }}" class="btn btn-success">Регистрация</a>
    </div>
@endsection
