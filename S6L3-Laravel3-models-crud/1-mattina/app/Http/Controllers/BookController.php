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

        return view('books.index', compact('books'));
        // return view('books.index', [
        //     'books' => $books,
        // ]);
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

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);

        // validare i dati

        // salvare i dati nel database
        $newBook = new Book();
        $newBook->title = $data['title'];
        $newBook->author = $data['author'];
        $newBook->price = $data['price'];
        $newBook->img = $data['img'];
        $newBook->save();

        Book::create($data); // necessita del $fillable nel model

        // ridirezionare
        return redirect()->route('books.show', ['id' => $newBook->id]);
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        // dd($book);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);

        // validare i dati
        // TODO: risolvere errore del campo duplicato con le validazioni

        // aggiornare i dati nel database
        $book = Book::findOrFail($id);
        $book->title = $data['title'];
        $book->author = $data['author'];
        $book->price = $data['price'];
        $book->img = $data['img'];
        $book->update();

        // ridirezionare
        return redirect()->route('books.show', ['id' => $id]);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index');
    }
}
