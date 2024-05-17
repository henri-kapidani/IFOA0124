<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // dal db prendiamo la lista dei libri
        $titles = [
            'piccolo principe',
            'promessi sposi',
            'harry potter',
            'altro',
        ];

        // $titles = [];

        // dd($titles);
        // dump($titles);
        // ddd($titles);

        return view('books.index', [
            'titles' => $titles,
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
