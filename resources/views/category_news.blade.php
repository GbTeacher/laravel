@extends('layouts.app')

@section('title', 'Category news page')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">{{ $category->name }}</h1>
        </div>
    </div>

    @forelse ($news as $oneNews)
        <div class="row mt-3">
            <div class="col-md-12">
                <h4>{{ $oneNews->title }}</h4>
                <p>{!! $oneNews->full_text !!}</p>
                <a href="{{ $oneNews->link }}" target="_blank">Читать в источнике</a>
            </div>
        </div>
        <hr>
    @empty
        <h1>Новостей нет.</h1>
    @endforelse
@endsection
