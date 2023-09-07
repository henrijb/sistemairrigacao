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


// tela login
Route::get('/', [\App\Http\Controllers\LoginController::class, 'login'])
    ->name('login');

Route::prefix('/app')->group(function() {

    // tela dashboar
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'dashboard'])
        ->name('dashboard');
    // tela plantas
    Route::get('/plantas', [\App\Http\Controllers\PlantasController::class, 'plantas'])
        ->name('plantas');
    // tela arduino
    Route::get('/arduino', [\App\Http\Controllers\ArduinoController::class, 'arduino'])
        ->name('arduino');
    // tela arduino com parametros
    Route::get('/arduino/{nome?}/{ano?}', function(
        string $nome = 'desconhecido', 
        int $ano = 1
        ) {
        echo $nome,' estamos aqui ' . $ano . ' anos';

        //return redirect()->route('login'); // redirect inline
    })
    ->where('ano', '([0-9]){1,}')
    ->where('nome', '[A-Z]{1}+[a-z]{1,}')
    ->name('arduino');
    // tela usuario
    Route::get('/usuario', [\App\Http\Controllers\UsuarioController::class, 'usuario'])
        ->name('usuario');

    // Route::redirect('/rota2', '/login', 301);

    Route::fallback(function() {
        echo 'Rota não existe. <a href="/">login</a>';
    });



    

});
