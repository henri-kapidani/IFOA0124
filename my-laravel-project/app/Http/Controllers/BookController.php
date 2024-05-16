<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    function index()
    {
        return 'lista dei libri';
    }

    function details($id)
    {
        return 'dettagli del libro ' . $id;
    }
}
