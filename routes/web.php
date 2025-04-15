<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;

Route::get('/', function () {
    return view('welcome');
});

// Redirección post-login
Route::get('/redireccion', function () {
    if (Auth::check() && Auth::user()->usertype === 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('carrito.dashboard');
    }
})->middleware(['auth'])->name('redireccion');

// Dashboard general (no se usará directamente)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil del usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dashboard de admin
Route::get('admin/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');

// Dashboard para usuarios normales (carrito)
Route::get('/carrito/dashboard', [CarritoController::class, 'verCarrito'])
    ->middleware(['auth'])
    ->name('carrito.dashboard');

// CRUDs
Route::middleware(['auth'])->group(function () {
    Route::resource('categorias', CategoriaController::class);
    Route::resource('productos', ProductoController::class);
});

// Carrito de compras
Route::middleware(['auth'])->group(function () {
    Route::get('/carrito', [CarritoController::class, 'verCarrito'])->name('carrito.ver');
    Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregarAlCarrito'])->name('carrito.agregar');
    Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'eliminarDelCarrito'])->name('carrito.eliminar');

    // Ruta para finalizar la compra
    Route::post('/carrito/checkout', [CarritoController::class, 'checkout'])->name('carrito.checkout');
});

// Auth routes
require __DIR__.'/auth.php';