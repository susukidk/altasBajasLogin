<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Clientes;
use App\Http\Controllers\Registros;
use App\Models\Registro;
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
Route::get('/', [AuthController::class, 'login'])->name('auth-login');
Route::post('/logear', [AuthController::class, 'logear'])->name('logear');
Route::get('/agregarUsuario', [AuthController::class, 'agregarUsuario']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/inicio', [Registros::class, 'index'])->name('inicio');



Route::get('/modules/clientes',[Registros::class,'index']);
Route::get('/modules/clientes/create',[Registros::class,'create']);
Route::post('/modules/clientes/store',[Registros::class, 'store']);  
Route::get('/modules/clientes/edit/{id}',[Registros::class, 'edit']) ->name('edit') ;
Route::put('/modules/clientes/update/{id}',[Registros::class, 'update'])->name('update');
Route::get('/modules/clientes/show/{id}',[Registros::class, 'show'])->name('show');
Route::delete('/modules/clientes/destroy/{id}',[Registros::class, 'destroy'])->name('destroy');