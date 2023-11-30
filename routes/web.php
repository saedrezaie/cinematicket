<?php

use App\Http\Controllers\Web\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/login" , [AuthController::class , "login"])->name("web.login");
Route::get("/register" , [AuthController::class , "register"])->name("web.register");
Route::get("/logout" , [AuthController::class , "logout"])->name("web.logout");

