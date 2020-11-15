@extends('layouts.app')

@section('title', 'Admin Feedback')

@section('content')
    <h1>Обратная связь</h1>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Комментарий</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @forelse($feedbacks as $feedback)
            <tr>
                <td>{{ $feedback->id }}</td>
                <td>{{ $feedback->name }}</td>
                <td>{{ $feedback->comment }}</td>
                <td>
                    <a href="{{ route('feedback.edit', ['feedback' => $feedback->id]) }}" class="text-dark mr-3"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>
                    <a href="#" class="text-danger delete-button" data-id="{{ $feedback->id }}" data-type="feedback">
                        <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @empty
            <h1>Нет отзывов</h1>
        @endforelse
        {{ $feedbacks->links() }}
        </tbody>
    </table>
@endsection


