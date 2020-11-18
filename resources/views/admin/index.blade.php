@extends('layouts.app')

@section('title', 'Admin')

@section('content')
    <ul class="list-group">
        <li class="list-group-item"><a class="text-dark" href="{{ route('user.index') }}">Пользователи</a></li>
        <li class="list-group-item"><a class="text-dark"  href="{{ route('news.index') }}">Новости</a></li>
        <li class="list-group-item"><a class="text-dark"  href="{{ route('feedback.index') }}">Обратная связь</a></li>
        <li class="list-group-item"><a class="text-dark" href="{{ route('order.index') }}">Заказы</a></li>
        <li class="list-group-item"><a class="text-dark" href="{{ route('parser') }}">Парсер</a></li>
    </ul>
@endsection


