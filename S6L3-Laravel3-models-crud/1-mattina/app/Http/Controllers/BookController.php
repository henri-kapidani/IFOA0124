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

        // $myVar = Book::where('price', 153)->get();
        // $myVar = Book::where('price', '>', 200)->get();
        $searchTerm = 'lorem';
        // $books = Book::where('title', 'LIKE', "%$searchTerm%")->orderBy('price', 'asc')->limit(3)->offset(2)->get();

        $books = Book::where('title', 'LIKE', "%$searchTerm%")->paginate(5);

        // $myVar = Book::where('price', 153)->max('id');
        // $myVar = Book::where()->count();
        // $myVar = Book::where()->max('price');
        // dump($books);

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
        $book = Book::findOrFail($id);
        // $book = Book::firstWhere('price', 153);
        // dd($book);

        return view('books.show', [
            'book' => $book
        ]);
    }

    public function edit($id)
    {
        return view('books.edit', compact('id'));
    }
}
