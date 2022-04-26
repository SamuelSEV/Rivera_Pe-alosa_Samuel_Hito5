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

Route::get('/lista/crear', [IncidenciasController::class, 'create'])->middleware(['auth'])->name('create');

Route::post('/lista/crear',  [IncidenciasController::class, 'store'])->middleware(['auth'])->name('store');

Route::get('/lista/editar/{id}', [IncidenciasController::class, 'edit'])->middleware(['auth'])->name('edit');

Route::put('/lista/editar/{id}',  [IncidenciasController::class, 'update'])->middleware(['auth'])->name('update');

Route::get('/lista/comentar/{id}', [ComentariosController::class, 'create'])->middleware(['auth'])->name('createComentario');

Route::put('/lista/comentar/{id}',  [ComentariosController::class, 'store'])->middleware(['auth'])->name('storeComentario');

Route::get('/usuarios/listar', [UserController::class, 'index']);

Route::get('/perfil/ver/{id}', [UserController::class, 'show']);

Route::get('/usuarios/editar/{id}', [UserController::class, 'edit'])->middleware(['auth'])->name('editUser');

Route::put('/usuarios/editar/{id}',  [UserController::class, 'update'])->middleware(['auth'])->name('updateUser');

Route::get('/usuarios/eliminar/{id}', [UserController::class, 'destroy'])->middleware(['auth'])->name('destroyUser');

Route::get('/logout', [UserController::class, 'logout']);

Route::middleware([
 
])->group(function () {
    Route::get('/', function () {
        return view('incidencias.index');
    })->name('index');
});
