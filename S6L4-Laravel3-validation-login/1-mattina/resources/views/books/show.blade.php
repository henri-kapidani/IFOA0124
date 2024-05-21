@extends('templates.base')

@section('title', "$book->title - EpiBooks")

@section('content')
    <h1>{{ $book->title }}</h1>

    @session('creation_success')
        <div class="alert alert-success" role="alert">
            Il libro è stato creato con successo
        </div>
    @endsession

    <h2>Author: {{ $book->author }}</h2>
    <img src="{{ $book->img }}" alt="">
@endsection
