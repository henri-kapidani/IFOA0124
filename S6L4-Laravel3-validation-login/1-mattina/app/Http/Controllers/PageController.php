<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request)
    {
        // dd($request->ciao);
        return view('home');
    }

    public function about()
    {
        return view('about');
    }
}
