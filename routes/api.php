<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PeliculasController;
// use App\Http\Controllers\Api\RegisterController;


//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/peliculas', [PeliculasController::class, 'store']);
    Route::put('/peliculas/{id}', [PeliculasController::class, 'update']);
    Route::delete('/peliculas/{id}', [PeliculasController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
//Public Routes
// Route::resource('peliculas', PeliculasController::class);
Route::get('/peliculas', [PeliculasController::class, 'index']);
Route::get('/peliculas/{id}', [PeliculasController::class, 'show']);
Route::get('/peliculas/search/{titulo}', [PeliculasController::class, 'search']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route::post('/register2', [RegisterController::class, 'register']);
// Route::post('/login2', [RegisterController::class, 'login']);


// Route::controller(RegisterController::class)->group(function () {
//     Route::post('register', 'register');
//     Route::post('login', 'login');
// });
/* Route::middleware('auth:sanctum')->group(function () {
    Route::get('/peliculas/search/{titulo}', [PeliculasController::class, 'search']);
}); */