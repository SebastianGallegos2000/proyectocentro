<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\MyVController;
use App\Http\Controllers\LogInTutoresController;
use App\Http\Controllers\LogInPersonalesController;
use App\Http\Controllers\ComunaController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\MascotasController;
use App\Http\Controllers\RazaMascotaController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------	
| Login Routes
|--------------------------------------------------------------------------
*/
Route::view('/loginTutor', 'loginTutor')->name('loginTutor');
Route::view('/loginPersonal', 'loginPersonal')->name('loginPersonal');

Route::get('/registroTutor', [LogInTutoresController::class, 'registerView'])->name('registroTutor');

Route::get('/tutorIndex', [MascotasController::class, 'index'])->middleware('auth')->name('privada');
Route::get('/personalIndex', [PersonalController::class, 'indexPersonal'])->middleware('auth')->name('privadaPersonal');

Route::post('/validar-registro', [LogInTutoresController::class, 'register'])->name('validar-registro');

Route::post('/inicia-sesion', [LogInTutoresController::class, 'login'])->name('inicia-sesion');
Route::post('/inicia-sesion-personal', [LogInPersonalesController::class, 'login'])->name('inicia-sesion-personal');

Route::get('/logoutTutores', [LogInTutoresController::class, 'logout'])->name('logout');
Route::get('/logoutPersonal', [LogInPersonalesController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------	
| Texto estático Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('indexg');
});

Route::get('/about',AboutController::class);
Route::get('/misionyvision',MyVController::class);


/*
|--------------------------------------------------------------------------	
| Resources Routes
|--------------------------------------------------------------------------
*/

Route::get('/usuarios',UsuarioController::class);


//Route::get('/registroTutor', [TutorController::class, 'create'])->name('registroTutor');
Route::post('/tutor/store', [TutorController::class, 'store'])->name('storeTutor');
Route::get('/tutor/{tutor}/edit', [TutorController::class, 'edit'])->name('editTutor');
Route::post('/tutor/{tutor}/update', [TutorController::class, 'update'])->name('updateTutor');

Route::get('/perfilTutor', [TutorController::class, 'show'])->name('perfilTutor');

Route::get('/mascotaIndex', [MascotasController::class, 'index'])->name('mascotaIndex');
Route::get('/crearMascota', [MascotasController::class, 'create'])->name('createMascota');
Route::post('/mascota/store', [MascotasController::class, 'store'])->name('storeMascota');
Route::get('/mascota/{mascota}/edit', [MascotasController::class, 'edit'])->name('editMascota');
Route::post('/mascota/{mascota}/update', [MascotasController::class, 'update'])->name('updateMascota');


Route::get('/adminIndex', [AdminController::class, 'index'])->name('adminIndex');
Route::get('/admin/create', [AdminController::class, 'create'])->name('createAdmin');
Route::post('/admin/store', [AdminController::class, 'store'])->name('storeAdmin');
Route::get('/admin/{admin}/edit', [AdminController::class, 'edit'])->name('editAdmin');
Route::post('/admin/{admin}/update', [AdminController::class, 'update'])->name('updateAdmin');

Route::get('/insumoIndex', [InsumoController::class, 'index'])->name('insumoIndex');
Route::get('/insumo/create', [InsumoController::class, 'create'])->name('createInsumo');
Route::post('/insumo/store', [InsumoController::class, 'store'])->name('storeInsumo');
Route::get('/insumo/{insumo}/edit', [InsumoController::class, 'edit'])->name('editInsumo');
Route::post('/insumo/{insumo}/update', [InsumoController::class, 'update'])->name('updateInsumo'); 


Route::get('/rolesIndex', [RolController::class, 'index'])->name('rolesIndex');
Route::get('/roles/create', [RolController::class, 'create'])->name('createRol');
Route::post('/roles/store', [RolController::class, 'store'])->name('storeRol');
Route::get('/roles/{role}/edit', [RolController::class, 'edit'])->name('editRol');
Route::post('/roles/{role}/update', [RolController::class, 'update'])->name('updateRol');


Route::get('/comunaIndex', [ComunaController::class, 'index'])->name('comunaIndex');
Route::get('/comuna/create', [ComunaController::class, 'create'])->name('createComuna');
Route::post('/comuna/store', [ComunaController::class, 'store'])->name('storeComuna');
Route::get('/comuna/{comuna}/edit', [ComunaController::class, 'edit'])->name('editComuna');
Route::post('/comuna/{comuna}/update', [ComunaController::class, 'update'])->name('updateComuna');

Route::get('/razamascotaIndex', [RazaMascotaController::class, 'index'])->name('razamascotaIndex');
Route::get('/razamascota/create', [RazaMascotaController::class, 'create'])->name('createRazaMascota');
Route::post('/razamascota/store', [RazaMascotaController::class, 'store'])->name('storeRazaMascota');
Route::get('/razamascota/{razamascotum}/edit', [RazaMascotaController::class, 'edit'])->name('editRazaMascota');
Route::post('/razamascota/{razamascotum}/update', [RazaMascotaController::class, 'update'])->name('updateRazaMascota');

Route::get('/especialidadIndex', [EspecialidadController::class, 'index'])->name('especialidadIndex');
Route::get('/especialidad/create', [EspecialidadController::class, 'create'])->name('createEspecialidad');
Route::post('/especialidad/store', [EspecialidadController::class, 'store'])->name('storeEspecialidad');
Route::get('/especialidad/{especialidad}/edit', [EspecialidadController::class, 'edit'])->name('editEspecialidad');
Route::post('/especialidad/{especialidad}/update', [EspecialidadController::class, 'update'])->name('updateEspecialidad');

Route::get('/editPersonalUser', [PersonalController::class, 'editUserView'])->name('editPersonalView');
Route::post('/updatePersonalUser', [PersonalController::class, 'UpdateUser'])->name('updatePersonalUser');
Route::get('/personal/create', [PersonalController::class, 'create'])->name('createPersonal');
Route::post('/personal/store', [PersonalController::class, 'store'])->name('storePersonal');
Route::get('/personal/{personal}/edit', [PersonalController::class, 'edit'])->name('editPersonal');
Route::post('/personal/{personal}/update', [PersonalController::class, 'update'])->name('updatePersonal');
Route::get('/perfilPersonal', [PersonalController::class, 'show'])->name('perfilPersonal');

