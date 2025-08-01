<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ImageController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin');

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::prefix('admin')->name('admin.')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // CRUD de categorías
    Route::resource('categories', CategoryController::class);

    // CRUD de productos
    Route::resource('products', ProductController::class);

    // Subida de imágenes por Dropzone
    Route::post('products/{product}/dropzone', [ProductController::class, 'dropzone'])
        ->name('products.dropzone');

    // Eliminar imágenes
    Route::delete('images/{image}', [ImageController::class, 'destroy'])
        ->name('images.destroy');
});