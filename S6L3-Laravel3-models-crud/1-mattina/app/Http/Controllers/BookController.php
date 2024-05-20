<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // dal db prendiamo la lista dei libri
        // $books = Book::all();
        $books = Book::paginate(); // default 15 per pagina
        // dd($books);
        // dump($books);
        // ddd($books);

        // $myVar = Book::where('price', 153)->get();
        // $myVar = Book::where('price', '>', 200)->get();
        $searchTerm = 'lorem';
        // $books = Book::where('title', 'LIKE', "%$searchTerm%")->orderBy('price', 'asc')->limit(3)->offset(2)->get();

        // $books = Book::where('title', 'LIKE', "%$searchTerm%")->paginate(5);

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

    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        // salvare i dati nel database
        $newBook = new Book();
        $newBook->title = $data['title'];
        $newBook->author = $data['author'];
        $newBook->price = $data['price'];
        $newBook->img = $data['img'];
        $newBook->save();

        // Book::insert

        // ridirezionare
        return redirect()->route('books.index');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index');
    }
}
