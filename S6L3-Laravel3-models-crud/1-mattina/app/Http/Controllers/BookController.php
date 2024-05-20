<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // dal db prendiamo la lista dei libri
        $books = Book::all();
        // dd($books);
        // dump($books);
        // ddd($books);

        return view('books.index', [
            'books' => $books,
        ]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function show($id)
    {
        return view('books.show', [
            'id' => $id
        ]);
    }

    public function edit($id)
    {
        return view('books.edit', compact('id'));
    }
}
