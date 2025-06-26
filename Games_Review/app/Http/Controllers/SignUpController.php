<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SignUpController extends Controller
{
    public function index()
    {
        return view('signUp');
    }

    public function create(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'gametag' => 'required|string|max:255|unique:users,user_gametag',
        'image' => 'nullable|url',
        'email' => 'required|string|email|max:255|unique:users,user_email',
        'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'user_name' => $request->name,
            'user_gametag' => $request->gametag,
            'user_image' => $request->image,
            'user_email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('home');
    }
}
