<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function show(string $notica = null)
    {
        return view('noticias.show');
    }
}
