<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\Admin\UserController;


Route::prefix("admin")->name('admin.')->group(function () {

   Route::middleware("isAdmin")->group(function () {
        Route::view('register','admin.register')->name("register");
        Route::view('login','admin.login')->name("login");
        Route::view('index','admin.index')->name("index");

        //show pending users
        Route::get('/users', [UserController::class, 'index'])->name('users.index');

        // Approve a user
        Route::post('/users/{user}/approve', [UserController::class, 'approve'])->name('users.approve');
    
        // Reject a user
        Route::post('/users/{user}/reject', [UserController::class, 'reject'])->name('users.reject');


   });

    require __DIR__.'/admin_auth.php';

});





