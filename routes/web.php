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

/**
 * Home Routes
 */
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
    ->name('home.index');

/** 
 * Rota Usuarios 
 */
Route::prefix('/users')->group(function() {
    
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])
        ->name('us_index');

    Route::get('/create', [\App\Http\Controllers\UserController::class, 'create'])
        ->name('us_create');

    Route::post('/create', [\App\Http\Controllers\UserController::class, 'store'])
        ->name('us_store');

    Route::get('/{user}/show', [\App\Http\Controllers\UserController::class, 'show'])
        ->name('us_show');

    Route::get('/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])
        ->name('us_edit');
        
    Route::put('/{user}/update', [\App\Http\Controllers\UserController::class, 'update']);

    Route::delete('/{users}/delete', [\App\Http\Controllers\UserController::class, 'destroy'])
        ->name('us_delete');
});


/** Rota Plantas */
Route::prefix('/plantas')->group(function() {
    
    Route::get('/', [\App\Http\Controllers\PlantaController::class, 'index'])
        ->name('pl_index');

    Route::get('/create', [\App\Http\Controllers\PlantaController::class, 'create'])
        ->name('pl_create');

    Route::post('/create', [\App\Http\Controllers\PlantaController::class, 'store'])
        ->name('pl_store');

    Route::get('/{user}/show', [\App\Http\Controllers\PlantaController::class, 'show'])
        ->name('pl_show');

    Route::get('/{user}/edit', [\App\Http\Controllers\PlantaController::class, 'edit'])
        ->name('pl_edit');
        
    Route::put('/{user}/update', [\App\Http\Controllers\PlantaController::class, 'update']);

    Route::delete('/{users}/delete', [\App\Http\Controllers\PlantaController::class, 'destroy'])
        ->name('pl_delete');
});


/** Rota Controladora */
Route::prefix('/controladoras')->group(function() {
    
    Route::get('/', [\App\Http\Controllers\ControladoraController::class, 'index'])
        ->name('ct_index');

    Route::get('/create', [\App\Http\Controllers\ControladoraController::class, 'create'])
        ->name('ct_create');

    Route::post('/create', [\App\Http\Controllers\ControladoraController::class, 'store'])
        ->name('ct_store');

    Route::get('/{user}/show', [\App\Http\Controllers\ControladoraController::class, 'show'])
        ->name('ct_show');

    Route::get('/{user}/edit', [\App\Http\Controllers\ControladoraController::class, 'edit'])
        ->name('ct_edit');
        
    Route::put('/{user}/update', [\App\Http\Controllers\ControladoraController::class, 'update']);

    Route::delete('/{users}/delete', [\App\Http\Controllers\ControladoraController::class, 'destroy'])
        ->name('ct_delete');
});

/*
/**
     * Home Routes
     * /
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         * /
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         * /
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         * /
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * User Routes
         * /
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });
        
    });

*/