<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdministradorMiddleware;


// Route::middleware(AuthenticateMiddleware::class)->group(function () {
    
// });

Route::middleware("auth")->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

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
    // gestión de usuarios
    Route::get('/admin/registrar', [AdminController::class, 'createUser'])->name('admin.registrar');
    Route::post('/admin/registrar', [AdminController::class, 'storeUser'])->name('admin.registrar.store');
    //gestión de categorias
    Route::post('/admin/agregar', [CategoryController::class, 'store'])->name('admin.agregar');
    Route::put('/admin/editar/{id}', [CategoryController::class, 'update'])->name('admin.editar');
    Route::delete('/admin/eliminar/{id}', [CategoryController::class, 'destroy'])->name('admin.eliminar');
    // gestión de subcategorias
    Route::get('/admin/mostrar/{id}', [SubCategoryController::class, 'show'])->name('admin.mostrar');
    Route::post('/admin/subcategorias/{id}', [SubCategoryController::class,'store'])->name('admin.subcategorias.store');
    Route::put('/admin/subcategorias/editar/{id}', [SubCategoryController::class, 'update'])->name('admin.subcategorias.editar');
    Route::delete('/admin/subcategorias/eliminar/{id}', [SubCategoryController::class, 'destroy'])->name('admin.subcategorias.eliminar');
});
