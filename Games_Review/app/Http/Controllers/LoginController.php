<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        // Buscar usuário por email OU gametag
        $user = User::where('user_email', $request->login)
                    ->orWhere('user_gamertag', $request->login)
                    ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['login' => 'Credenciais inválidas'])->withInput();
        }

        // Autenticar usuário
        Auth::login($user);

        return redirect()->route('home'); // ou outra página após login
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

}
