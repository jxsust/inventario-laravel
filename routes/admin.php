<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ImageController;


Route::get('/', function(){
    return view('admin.dashboard');
})->name('dashboard');

Route::resource('categories', CategoryController::class)->except(['show']);

Route::resource('products', ProductController::class)->except(['show']);
Route::post('products/{product}/dropzone', [ProductController::class, 'dropzone'])
    ->name('products.dropzone');

    Route::delete('images/{image}', [ImageController::class, 'destroy'])
    ->name('images.destroy');