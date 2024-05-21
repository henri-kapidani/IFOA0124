@extends('templates.base')

@section('title', 'Libreria - Index of Books')

@section('content')
    <h1>Books list</h1>
    {{-- @dd($books) --}}
    {{-- @dump($books) --}}

    {{-- @dd(Auth::user()) --}}

    {{-- visualizzare il messaggio se c'è --}}

    @session('saluto')
        <div class="alert alert-success" role="alert">
            {{ session('saluto') }}
        </div>
    @endsession

    @session('no_permission')
        <div class="alert alert-danger" role="alert">
            Non hai i permessi per modificare il post
        </div>
    @endsession

    @session('operation_success')
        <div class="alert alert-success" role="alert">
            Il libro "{{ session('operation_success')->title }}" è stato eliminato con successo
        </div>
    @endsession

    @session('update_success')
        <div class="alert alert-success" role="alert">
            Risorsa "{{ session('update_success')->title }}" aggiornata <a
                href="{{ route('books.show', ['id' => session('update_success')->id]) }}">Visualizza</a>
        </div>
    @endsession

    @if ($books->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Author</th>
                    <th scope="col">Img</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Updated_at</th>
                    @auth <th scope="col">Actions</th> @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <th scope="row">{{ $book->id }}</th>
                        <td><a href="{{ route('books.show', ['id' => $book]) }}">{{ $book->title }}</a></td>
                        <td>{{ $book->price }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->img }}</td>
                        <td>{{ $book->created_at }}</td>
                        <td>{{ $book->updated_at }}</td>
                        @auth
                            <td>
                                @if (Auth::user()->id === $book->user_id)
                                    <a class="btn btn-warning" href="{{ route('books.edit', ['id' => $book]) }}">Edit</a>
                                    <form action="{{ route('books.destroy', ['id' => $book]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">Elimina</button>
                                    </form>
                                @endif
                            </td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $books->links() }}
    @else
        <h2>Non ci sono libri</h2>
    @endif
@endsection
