<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\ProductsController;

Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/admin/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
Route::post('/admin/categories/store', [CategoriesController::class, 'store'])->name('categories.store');
Route::get('/admin/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::put('/admin/categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
Route::delete('/admin/categories/destroy/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');


Route::resource('/admin/products', ProductsController::class);


Route::get('{path}', function () {
    return view('welcome');
})->where('path','.*');
