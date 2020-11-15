@extends('layouts.app')

@section('title', 'Admin News')

@section('content')
    <h1>Новости</h1>
    <a href="{{ route('news.create') }}" class="btn btn-dark mb-3 float-right">Добавить новость</a>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Текст</th>
                <th scope="col">Фотография</th>
                <th scope="col">Категория</th>
                <th scope="col">Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($news as $oneNews)
                <tr>
                    <td>{{ $oneNews->id }}</td>
                    <td>{{ $oneNews->title }}</td>
                    <td>{{ $oneNews->short_text }}</td>
                    <td><img src="{{ $oneNews->photo }}" alt="" style="max-width: 300px;"></td>
                    <td>{{ $categories->get($oneNews->category_id)->name }}</td>
                    <td>
                        <a href="{{ route('news.edit', ['news' => $oneNews->id]) }}" class="text-dark mr-3"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>
                        <a href="#" class="text-danger delete-button" data-type="news" data-id="{{ $oneNews->id }}">
                            <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <h1>Нет новостей</h1>
            @endforelse
        {{ $news->links() }}
        </tbody>
    </table>
@endsection


