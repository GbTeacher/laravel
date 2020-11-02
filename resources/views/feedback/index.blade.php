@extends('layouts.main')

@section('title', 'Feedback')

@section('content')

    <h1>Обратная связь</h1>

    @if(!empty($status) && $status)
        <div class="alert alert-success" role="alert">
            Форма обратной связи успешно отправлена.
        </div>
    @endif

    <form action="{{ route('feedback.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="comment">Комментарий</label>
                    <textarea class="form-control" id="comment" name="comment" rows="7" required>{{ old('comment') }}</textarea>
                </div>
                <button type="submit" class="btn btn-dark btn-block">Отправить</button>
            </div>
        </div>
    </form>
@endsection
