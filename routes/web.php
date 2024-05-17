<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\MyVController;
use App\Http\Controllers\LogInTutoresController;
use App\Http\Controllers\ComunaController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\RazaMascotaController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\LogInPersonalesController;
use App\Http\Controllers\UsuarioController;

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
Route::get('/loginTutores', LogInTutoresController::class)->name('loginTutor');
Route::get('/loginPersonal',LogInPersonalesController::class)->name('loginPersonal');

Route::get('/usuarios',UsuarioController::class);

Route::resource('/tutor',TutorController::class);

Route::resource('/admin',AdminController::class);

Route::resource('/insumo',InsumoController::class);

Route::resource('/roles',RolController::class);

Route::resource('/comunas',ComunaController::class);

Route::resource('/razamascota',RazaMascotaController::class);

Route::resource('/especialidad',EspecialidadController::class);

Route::resource('/personal',PersonalController::class);
