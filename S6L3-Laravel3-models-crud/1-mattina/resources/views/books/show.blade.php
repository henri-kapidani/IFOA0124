@extends('templates.base')

@section('title', "$book->title - EpiBooks")

@section('content')
    <h1>{{ $book->title }}</h1>
    <h2>Author: {{ $book->author }}</h2>
    <img src="{{ $book->img }}" alt="">
@endsection
