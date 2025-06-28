<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Plataforma;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        $plataformas = Plataforma::all();
        $analises = Review::with('categoria', 'plataforma')
        ->orderBy('created_at', 'desc')
        ->get();
        //dd($categorias, $plataformas);
        return view('home', compact('categorias', 'plataformas', 'analises'));
    }
}
