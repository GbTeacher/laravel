@extends('layouts.main')

@section('title', 'Add News')

@section('content')
    <form action="{{ route('news.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="category">Категория</label>
                    <select class="form-control" id="category" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->id }} / {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="photo">Фотография</label>
                    <input type="text" class="form-control" id="photo" name="photo" placeholder="Ссылка..." value="{{ old('photo') }}">
                </div>
                <div class="form-group">
                    <label for="short-text">Короткий текст</label>
                    <textarea class="form-control" id="short-text" name="short_text" rows="3">{{ old('short_text') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="full-text">Полный текст</label>
                    <textarea class="form-control" id="full-text" name="full_text" rows="7">{{ old('full_text') }}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light mb-3" style="max-width: 100%;">
                    <div class="card-body">
                        <button type="submit" class="btn btn-dark btn-block">Сохранить</button>
                        <a href="{{ route('news.index') }}" class="btn btn-danger btn-block">Отмена</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
