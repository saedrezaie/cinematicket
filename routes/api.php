<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\CinemaController;
use App\Http\Controllers\Api\V1\CityController;
use App\Http\Controllers\Api\V1\MovieController;
use App\Http\Controllers\Api\V1\RoleController;
use App\Http\Controllers\Api\V1\SectionController;
use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\BrandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::post('/login', [AuthController::class, 'login'])->name("login");
route::Post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name("logout");
route::post('/register', [AuthController::class, 'register'])->name("register");
Route::post('/RoleToUser', [RoleController::class, "RoleToUser"]);
Route::post('/detach', [RoleController::class, "Detach"]);

Route::middleware("auth:sanctum")->group(function () {
    Route::apiResource('/category', CategoryController::class);
    Route::apiResource('/cinema', CinemaController::class);
    Route::apiResource('/city', CityController::class);
    Route::apiResource('/movie', MovieController::class);
    Route::apiresource('/role', RoleController::class);
    Route::apiResource('/ticket', TicketController::class);
    Route::apiresource('/user', UserController::class);
    Route::apiResource('/section' , SectionController::class);
    Route::apiResource('brand', BrandController::class)->withTrashed();
});
Route::delete('user/force/{id}',[UserController::class,'forceDelete']);
Route::get("user/restore/{id}" , [UserController::class , 'restore']);
Route::delete('brand/force/{id}',[BrandController::class,'forceDelete']);
Route::delete('city/force/{id}',[CityController::class,'forceDelete']);
Route::get('city/restore/{id}',[CityController::class,'restore']);
Route::delete('cinema/force/{id}',[CinemaController::class,'forceDelete']);
Route::get('cinema/restore/{id}',[CinemaController::class,'restore']);
Route::delete('movie/force/{id}',[MovieController::class,'forceDelete']);
Route::get('movie/restore/{iid}',[MovieController::class,'restore']);
Route::delete('role/force/{id}',[RoleController::class,'forceDelete']);
Route::get('role/restore/{id}',[RoleController::class,'restore']);
Route::delete('ticket/force/{id}',[TicketController::class,'forceDelete']);
Route::get('ticket/restore/{id}',[TicketController::class,'restore']);
Route::delete('section/force/{id}',[SectionController::class,'forceDelete']);
Route::get('section/restore/{id}',[SectionController::class,'restore']);
Route::delete('category/force/{id}',[CategoryController::class,'forceDelete']);
Route::get('category/restore/{id}',[CategoryController::class,'restore']);
