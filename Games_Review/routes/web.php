<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\LoginController;

Route::get('/', [HomeController::class, 'index'])->name('home');

/*---------------Rotas Cadastros----------------*/
Route::get('/entrar', [LoginController::class, 'index'])->name('login');
Route::post('/entrar', [LoginController::class, 'login'])->name('postLogin');
Route::post('/sair', [LoginController::class, 'logout'])->name('logout');

Route::get('/cadastro', [SignUpController::class, 'index'])->name('cadastro');
Route::post('/cadastro', [SignUpController::class, 'create'])->name('postCadastro');

/*---------------Rotas do Usuário----------------*/
Route::get('/perfil/{slug}', [UserController::class, 'index'])->name('perfil');
Route::put('/perfil', [UserController::class, 'update'])->name('postPerfil');

/*---------------Rotas das Reviews----------------*/
Route::post('/reviews/create', [ReviewController::class, 'store'])->name('createReview');
Route::post('/review/{id}/like', [ReviewController::class, 'toggleLike'])->name('reviews.like');
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('deleteReview');


