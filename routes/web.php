<?php

use App\Http\Controllers\LoginController;
use App\Http\Middleware\AuthenticateMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(AuthenticateMiddleware::class)->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/registro', [LoginController::class, 'showRegister'])->name('register');

// Route::post('/validar_registro', [LoginController::class, 'register'])->name('validar_registro');
// Route::post('/inicia_sesion', [LoginController::class, 'login'])->name('inicia_sesion');
// Route::get('/cerrar_sesion', [LoginController::class, 'logout'])->name('cerrar_sesion');