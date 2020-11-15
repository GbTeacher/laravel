@extends('layouts.app')

@section('title', 'Edit Feedback')

@section('content')
    <form action="{{ route('feedback.update', ['feedback' => $feedback->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $feedback->name) }}">
                </div>
                <div class="form-group">
                    <label for="full-text">Комментарий</label>
                    <textarea class="form-control" id="comment" name="comment" rows="7">{{ old('comment', $feedback->comment) }}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light mb-3" style="max-width: 100%;">
                    <div class="card-body">
                        <button type="submit" class="btn btn-dark btn-block">Сохранить</button>
                        <a href="{{ route('feedback.index') }}" class="btn btn-danger btn-block">Отмена</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
