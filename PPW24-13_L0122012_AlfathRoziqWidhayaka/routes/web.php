<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Route;

// Redirect ke halaman login sebagai halaman pertama
Route::get('/', function () {
    return redirect()->route('login');
});

// Route untuk resource film
Route::get('films', [FilmController::class, 'index'])->name('films.index');
Route::get('films/create', [FilmController::class, 'create'])->name('films.create');
Route::post('films', [FilmController::class, 'store'])->name('films.store');
Route::get('films/{film}', [FilmController::class, 'show'])->name('films.show');
Route::get('films/{film}/edit', [FilmController::class, 'edit'])->name('films.edit');
Route::put('films/{film}', [FilmController::class, 'update'])->name('films.update');
Route::delete('films/{film}', [FilmController::class, 'destroy'])->name('films.destroy');

// Route untuk halaman login dan register
Route::get('/loginregister/login', function () {
    return view('loginregister.login');
})->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');

Route::get('/loginregister/register', function () {
    return view('loginregister.register');
});

Route::post('/register', [AuthController::class, 'register'])->name('register');
