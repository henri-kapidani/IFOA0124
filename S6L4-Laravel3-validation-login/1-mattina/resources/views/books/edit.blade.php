@extends('templates.base')

@section('title', 'Libreria - About')

@section('content')
    <h1>Books create</h1>
    <form method="POST" action="{{ route('books.update', ['id' => $book]) }}">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $book->price }}">
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Image url</label>
            <input type="text" class="form-control" id="img" name="img" value="{{ $book->img }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
