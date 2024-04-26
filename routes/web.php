<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\InsumosController;
use App\Http\Controllers\MyVController;
use App\Http\Controllers\LogInTutoresController;
use App\Http\Controllers\TutoresController;
use App\Http\Controllers\LogInPersonalesController;
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
    return view('indexg');

});
Route::get('/about',AboutController::class);
Route::get('/misionyvision',MyVController::class);
Route::get('/loginTutores',LogInTutoresController::class);
Route::get('/loginPersonal',LogInPersonalesController::class);
Route::resource('/tutores',TutoresController::class);

Route::resource('/insumos',InsumosController::class);
