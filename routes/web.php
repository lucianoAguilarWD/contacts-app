<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


// Route::middleware(AuthenticateMiddleware::class)->group(function () {
    
// });

Route::middleware("auth")->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    // Route::get("/profile", [ProfileController::class, "edit"])->name(
    //     "profile.edit"
    // );

    // Route::patch("/profile", [ProfileController::class, "update"])->name(
    //     "profile.update"
    // );

    // Route::delete("/profile", [ProfileController::class, "destroy"])->name(
    //     "profile.destroy"
    // );
});

// ----------------------------------------------------------------
// rutas de login
Route::middleware("guest")->group(function () {
    Route::view('/login', 'Auth.Login')->name('login');
    Route::view('/registro', 'Auth.Register')->name('register');
});

Route::post('/register', [LoginController::class, 'register'])->name('validar_registro');
Route::post('/login', [LoginController::class, 'login'])->name('inicia_sesion');
Route::post('/logout', [LoginController::class, 'logout'])->name('cerrar_sesion');

// ----------------------------------------------------------------
