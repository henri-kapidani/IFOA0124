<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homepage()
    {
        // parlare al database
        // fare le validazioni
        // generare dati nuovi
        return view('welcome');
    }

    public function ciao()
    {
        // qui ci potrebbe essere un casino di codice
        return view('ciao');
    }

    public function info()
    {
        // qui ci potrebbe essere un casino di codice
        return view('info');
    }
}
