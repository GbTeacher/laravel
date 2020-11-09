@extends('layouts.main')

@section('title', 'Admin')

@section('content')
    <ul class="list-group">
        <li class="list-group-item"><a class="text-dark"  href="{{ route('news.index') }}">Новости</a></li>
        <li class="list-group-item"><a class="text-dark"  href="{{ route('feedback.index') }}">Обратная связь</a></li>
        <li class="list-group-item"><a class="text-dark" href="{{ route('order.index') }}">Заказы</a></li>
    </ul>
@endsection


