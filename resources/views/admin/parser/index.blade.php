@extends('layouts.app')

@section('title', 'Admin Parser')

@section('content')
    <h3>Выберите источник</h3>

    <form action="{{ route('parser.parse') }}" method="post">
        @csrf
        @foreach($sources as $key => $source)
            <div class="form-check">
                <input name="sources[]" class="form-check-input" type="checkbox" value="{{ $source->id }}" id="{{ sprintf('checkbox%s', $source->id) }}">
                <label class="form-check-label" for="{{ sprintf('checkbox%s', $source->id) }}">
                    {{ $source->title }}
                </label>
            </div>
        @endforeach

            <input type="submit" class="btn btn-dark mt-2" value="Поехали">
    </form>

@endsection


