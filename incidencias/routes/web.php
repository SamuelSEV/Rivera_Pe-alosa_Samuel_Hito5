<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidenciasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComentariosController;

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

Route::get('/', function () {
    return view('incidencias.index');
});

Route::get('/lista', [IncidenciasController::class, 'index']);

Route::get('/login', [UserController::class, 'index']);

Route::get('/perfil/{id}', [UserController::class, 'show']);

Route::get('/logout', [UserController::class, 'logout']);



Route::middleware([
 
])->group(function () {
    Route::get('/', function () {
        return view('incidencias.index');
    })->name('index');
});
