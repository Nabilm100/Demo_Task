<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
  
//-------------blog-----------------------
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');

Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');

   }); 


 /*

Route::middleware(['auth','blog.owner'])->group(function () {
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
});  */

   


