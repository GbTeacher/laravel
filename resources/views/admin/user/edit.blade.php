@extends('layouts.app')

@section('title', 'Edit user')

@section('content')
    <form method="POST" action="{{ route('user.update', ['user' => $user->id]) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                </div>
                <div class="form-group">
                    <label>Администратор</label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="is-admin-true" name="is_admin" class="custom-control-input" value="1" @if($user->is_admin) checked @endif>
                        <label class="custom-control-label" for="is-admin-true">Да</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="is-admin-false" name="is_admin" class="custom-control-input" value="0" @if(!$user->is_admin) checked @endif>
                        <label class="custom-control-label" for="is-admin-false">Нет</label>
                    </div>
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
