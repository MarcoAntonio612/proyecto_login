<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

// Página principal = productos
Route::get('/', [ProductController::class, 'index']);

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Roles
Route::get('/admin', function () {
    return "Bienvenido ADMIN";
})->middleware(['auth', 'role:admin']);

Route::get('/cliente', function () {
    return "Bienvenido CLIENTE";
})->middleware(['auth', 'role:cliente']);

// PRODUCTOS

// Ver productos
Route::get('/products', [ProductController::class, 'index']);

// Crear producto (admin)
Route::get('/products/create', [ProductController::class, 'create'])
    ->middleware(['auth', 'role:admin']);

// Guardar producto (admin)
Route::post('/products', [ProductController::class, 'store'])
    ->middleware(['auth', 'role:admin']);

// Editar producto
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])
    ->middleware(['auth', 'role:admin']);

// Actualizar
Route::put('/products/{id}', [ProductController::class, 'update'])
    ->middleware(['auth', 'role:admin']);

// Eliminar
Route::delete('/products/{id}', [ProductController::class, 'destroy'])
    ->middleware(['auth', 'role:admin']);

// Ver detalle
Route::get('/products/{id}', [ProductController::class, 'show']);


//Carrito
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Auth (NO mover esto)
require __DIR__.'/auth.php';