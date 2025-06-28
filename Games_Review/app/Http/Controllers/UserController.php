<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use App\Models\Plataforma;
use App\Models\Review;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categorias = Categoria::all();
        $plataformas = Plataforma::all();
        $minhasReviews = Review::with('categoria', 'plataforma')
        ->where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->get();

        $numeroAnalises = $user->reviews()->count(); // relacionamento hasMany
        $numeroCurtidas = $user->reviews()->sum('review_likes');

        return view('perfil', compact('categorias', 'plataformas', 'minhasReviews', 'numeroAnalises', 'numeroCurtidas'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $validatedData = $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'gamertag' => 'required',
            'imagem' => 'required',
        ]);

        $user->update([
            'user_name' => $request->input('nome'),
            'user_email' => $request->input('email'),
            'user_gamertag' => $request->input('gamertag'),
            'user_image' => $request->input('imagem'),
        ]);

        return redirect()->route('perfil', ['slug' => $user->user_gamertag]);
    }
}
