<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::prefix('/app')->group(function() {
    
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])
        ->name('usuarios');
    Route::get('/users/create', [\App\Http\Controllers\UserController::class, 'create'])
        ->name('usuarios_create');
    Route::post('/users', [\App\Http\Controllers\UserController::class, 'store'])
        ->name('usuarios_store');
    Route::get('/users/{id}', [\App\Http\Controllers\UserController::class, 'show'])
        ->name('usuarios_show');
    Route::get('/users/{id}/edit', [\App\Http\Controllers\UserController::class, 'edit'])
        ->name('usuarios_edit');
    Route::put('/users/{id}', [\App\Http\Controllers\UserController::class, 'update']);
    Route::delete('/users/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])
        ->name('usuarios_delete');
});
