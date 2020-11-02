@extends('layouts.main')

@section('title', 'Order')

@section('content')

    <h1>Заказ</h1>

    @if(!empty($status) && $status)
        <div class="alert alert-success" role="alert">
            Форма заказа успешно отправлена.
        </div>
    @endif

    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="info">Подробности заказа</label>
                    <input type="text" class="form-control" id="info" name="info" value="{{ old('info') }}" required>
                </div>
                <button type="submit" class="btn btn-dark btn-block">Отправить</button>
            </div>
        </div>
    </form>
@endsection
