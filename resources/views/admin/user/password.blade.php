@extends('layouts.app')

@section('title', 'Edit user password')

@section('content')
    <form method="POST" action="{{ route('user.password.update', ['user' => $user->id]) }}">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="old-password">Старый пароль</label>
                    <input type="password" class="form-control" id="old-password" name="old_password">
                </div>
                <div class="form-group">
                    <label for="password">Новый пароль</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Подтверждение пароля</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light mb-3" style="max-width: 100%;">
                    <div class="card-body">
                        <button type="submit" class="btn btn-dark btn-block">Сохранить</button>
                        <a href="{{ route('user.index') }}" class="btn btn-danger btn-block">Отмена</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
