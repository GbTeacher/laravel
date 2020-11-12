@extends('layouts.main')

@section('title', 'Admin Users')

@section('content')
    <h1>Заказы</h1>
    <a href="{{ route('user.create') }}" class="btn btn-dark mb-3 float-right">Добавить пользователя</a>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">E-mail</th>
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


