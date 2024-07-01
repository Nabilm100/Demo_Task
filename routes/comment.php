<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;


Route::middleware('auth')->group(function () {
  

//------------comment----------------------
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::post('/blogs/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');
   }); 


  /* 
  Route::middleware(['auth','comment.owner'])->group(function () {
      Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
  }); 

  */

   


