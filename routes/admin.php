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


Route::prefix("admin")->name('admin.')->group(function () {

   Route::middleware("isAdmin")->group(function () {
        Route::view('register','admin.register')->name("register");
        Route::view('login','admin.login')->name("login");
        Route::view('index','admin.index')->name("index");

   });

    require __DIR__.'/admin_auth.php';

});

//Route::view('/admin/register','admin.register');
//Route::view('/admin/login','admin.login');
//Route::view('/admin/index','admin.index');



