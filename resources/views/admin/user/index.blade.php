@extends('layouts.app')

@section('title', 'Admin Users')

@section('content')
    <h1>Пользователи</h1>
    <a href="{{ route('user.create') }}" class="btn btn-dark mb-3 float-right">Добавить пользователя</a>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">E-mail</th>
            <th scope="col">Админ</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->is_admin)
                        <i class="fa fa-check fa-2x text-success"></i>
                    @else
                        <i class="fa fa-times fa-2x text-danger"></i>
                    @endif
                </td>
                <td>
                    <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="text-dark mr-3"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>
                    <a href="{{ route('user.password', ['user' => $user->id]) }}" class="text-primary mr-3" title="Смена пароля"><i class="fa fa-key fa-2x"></i></a>
                    <a href="#" class="text-danger delete-button" data-id="{{ $user->id }}" data-type="user">
                        <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @empty
            <h1>Нет пользователей</h1>
        @endforelse
        {{ $users->links() }}
        </tbody>
    </table>
@endsection


