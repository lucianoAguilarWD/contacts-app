<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdministradorMiddleware;


// Route::middleware(AuthenticateMiddleware::class)->group(function () {
    
// });

Route::middleware("auth")->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/profile/show/{id}', [ProfileController::class, "show"])->name('profile.show');

    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit"
    );

    Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete("/profile/{id}", [ProfileController::class, "destroy"])->name(
        "profile.destroy"
    );
});

// ----------------------------------------------------------------
// rutas de login
Route::middleware('guest')->group(function () {
    Route::view('/login', 'Auth.Login')->name('login');
    Route::view('/registro', 'Auth.Register')->name('register');
});

Route::post('/register', [LoginController::class, 'register'])->name('validar_registro');
Route::post('/login', [LoginController::class, 'login'])->name('inicia_sesion');
Route::post('/logout', [LoginController::class, 'logout'])->name('cerrar_sesion');

// ----------------------------------------------------------------

Route::middleware(AdministradorMiddleware::class)->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/registrar', [AdminController::class, 'createUser'])->name('admin.registrar');

    Route::post('/admin/registrar', [AdminController::class, 'storeUser'])->name('admin.registrar.store');
});
