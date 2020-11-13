@extends('layouts.app')

@section('title', 'Admin News')

@section('content')
    <h1>Заказы</h1>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Телефон</th>
            <th scope="col">E-mail</th>
            <th scope="col">Комментарий</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @forelse($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->comment }}</td>
                <td>
                    <a href="{{ route('order.edit', ['order' => $order->id]) }}" class="text-dark mr-3"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>
                    <a href="#" class="text-danger delete-button" data-id="{{ $order->id }}" data-type="feedback">
                        <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @empty
            <h1>Нет заказов</h1>
        @endforelse
        {{ $orders->links() }}
        </tbody>
    </table>
@endsection


