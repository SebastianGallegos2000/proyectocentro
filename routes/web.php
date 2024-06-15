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
use App\Http\Controllers\SolicitudCitasController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TipoAtencionController;
use GuzzleHttp\Middleware;

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

Route::get('/tutorIndex', [MascotasController::class, 'index'])->middleware('auth','roltutor')->name('privada');
Route::get('/personalIndex', [PersonalController::class, 'indexPersonal'])->middleware(['auth','rolpersonal'])->name('privadaPersonal');

Route::post('/validar-registro', [LogInTutoresController::class, 'register'])->name('validar-registro');

Route::post('/inicia-sesion', [LogInTutoresController::class, 'login'])->name('inicia-sesion');
Route::post('/inicia-sesion-personal', [LogInPersonalesController::class, 'login'])->name('inicia-sesion-personal');

Route::get('/logoutTutores', [LogInTutoresController::class, 'logout'])->name('logoutTutor');
Route::get('/logoutPersonal', [LogInPersonalesController::class, 'logout'])->name('logoutPersonal');


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
| Error Routes
|--------------------------------------------------------------------------
*/

Route::get('no-autorizado',function(){
    return "Usted no está autorizado para ingresar a esta página";
});

/*
|--------------------------------------------------------------------------	
| Resources Routes
|--------------------------------------------------------------------------
*/

Route::get('/usuarios',UsuarioController::class)->name('usuarios');


//Route::get('/registroTutor', [TutorController::class, 'create'])->name('registroTutor');
Route::get('/tutor/create', [TutorController::class, 'create'])->name('createTutorAdmin');
Route::post('/tutor/store', [TutorController::class, 'store'])->name('storeTutor');
Route::get('/tutor/{id}/edit', [TutorController::class, 'edit'])->name('editTutor');
Route::post('/tutor/{tutor}/update', [TutorController::class, 'update'])->name('updateTutor');

//Editar tutores desde la vista administrador
Route::get('/tutor/{tutor}/editTutorAdmin', [TutorController::class, 'editTutorAdmin'])->name('editTutorAdmin');
//Actualizar tutores desde la vista administrador
Route::post('/tutor/{tutor}/updateTutorAdmin', [TutorController::class, 'updateTutorAdmin'])->name('updateTutorAdmin');


Route::get('/perfilTutor', [TutorController::class, 'show'])->middleware(['auth','roltutor'])->name('perfilTutor');
Route::get('/mascotaIndex', [MascotasController::class, 'index'])->middleware(['auth','roltutor'])->name('mascotaIndex');
Route::get('/crearMascota', [MascotasController::class, 'create'])->middleware(['auth','roltutor'])->name('createMascota');
Route::post('/mascota/store', [MascotasController::class, 'store'])->middleware(['auth','roltutor'])->name('storeMascota');
Route::get('/mascota/{mascota}/edit', [MascotasController::class, 'edit'])->middleware(['auth','roltutor'])->name('editMascota');
Route::post('/mascota/{mascota}/update', [MascotasController::class, 'update'])->middleware(['auth','roltutor'])->name('updateMascota');

Route::get('/solicitudCitas/create/{mascota}', [SolicitudCitasController::class, 'create'])->middleware(['auth','roltutor'])->name('solicitudCitas');
Route::post('/solicitudCitas/store', [SolicitudCitasController::class, 'store'])->middleware(['auth','roltutor'])->name('storeSolicitudCitas');
Route::get('/events', [SolicitudCitasController::class, 'getEvents']);

Route::get('/citaAgendada', [SolicitudCitasController::class, 'citaAgendada'])->middleware(['auth','roltutor'])->name('citaAgendada');
//RUTAS DE PERSONAL

Route::get('/insumoIndex', [InsumoController::class, 'index'])->middleware(['auth','rolpersonal'])->name('insumoIndex');
Route::get('/insumo/create', [InsumoController::class, 'create'])->middleware(['auth','rolpersonal'])->name('createInsumo');
Route::post('/insumo/store', [InsumoController::class, 'store'])->middleware(['auth','rolpersonal'])->name('storeInsumo');
Route::get('/insumo/{insumo}/edit', [InsumoController::class, 'edit'])->middleware(['auth','rolpersonal'])->name('editInsumo');
Route::post('/insumo/{insumo}/update', [InsumoController::class, 'update'])->middleware(['auth','rolpersonal'])->name('updateInsumo'); 
Route::delete('/insumo/{id}', [InsumoController::class, 'destroy'])->name('destroyInsumo');

Route::get('/insumo/{insumo}/editInsumoAdmin', [InsumoController::class, 'editInsumoAdmin'])->name('editInsumoAdmin');
Route::post('insumo/{insumo}/updateInsumoAdmin', [InsumoController::class, 'updateInsumoAdmin'])->name('updateInsumoAdmin');
Route::get('/mascotaList', [MascotasController::class, 'list'])->middleware(['auth','rolpersonal'])->name('mascotaList');

Route::get('/tutoresList', [TutorController::class, 'list'])->middleware(['auth','rolpersonal'])->name('tutoresList');

Route::get('/perfilPersonal', [PersonalController::class, 'show'])->middleware(['auth','rolpersonal'])->name('perfilPersonal');
Route::post('/personal/{personal}/update', [PersonalController::class, 'update'])->middleware(['auth','rolpersonal'])->name('updatePersonal');

Route::get('/citasPersonal', [PersonalController::class, 'citas'])->middleware(['auth','rolpersonal'])->name('citasPersonal');

//RUTAS DE ADMINISTRADOR

Route::get('/adminIndex', [AdminController::class, 'index'])->name('adminIndex');
Route::get('/admin/create', [AdminController::class, 'create'])->name('createAdmin');
Route::post('/admin/store', [AdminController::class, 'store'])->name('storeAdmin');
Route::get('/admin/{admin}/edit', [AdminController::class, 'edit'])->name('editAdmin');
Route::post('/admin/{admin}/update', [AdminController::class, 'update'])->name('updateAdmin');

Route::get('/insumoIndexAdmin', [InsumoController::class, 'indexAdmin'])->name('insumoIndexAdmin');
Route::get('/insumo/createAdmin', [InsumoController::class, 'createAdmin'])->name('createInsumoAdmin');
Route::post('/insumo/storeAdmin', [InsumoController::class, 'storeAdmin'])->name('storeInsumoAdmin');

Route::get('citasAdmin', [AdminController::class, 'citas'])->name('citasAdmin');
//Route para utilizar el destroy de insumo
Route::delete('/insumoAdmin/{id}', [InsumoController::class, 'destroyAdmin'])->name('destroyInsumoAdmin');

Route::get('/tipoAtencionIndex', [TipoAtencionController::class, 'index'])->name('tipoAtencionIndex');
Route::get('/tipoAtencion/create', [TipoAtencionController::class, 'create'])->name('createTipoAtencion');
Route::post('/tipoAtencion/store', [TipoAtencionController::class, 'store'])->name('storeTipoAtencion');
Route::get('/tipoAtencion/{tipoAtencion}/edit', [TipoAtencionController::class, 'edit'])->name('editTipoAtencion');
Route::post('/tipoAtencion/{tipoAtencion}/update', [TipoAtencionController::class, 'update'])->name('updateTipoAtencion');

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

Route::get('/personal/{id}/edit', [PersonalController::class, 'edit'])->name('editPersonal');

//Route::get('/editPersonalUser', [PersonalController::class, 'editUserView'])->name('editPersonalView');
Route::post('/updatePersonalUser', [PersonalController::class, 'UpdateUser'])->name('updatePersonalUser');
Route::get('/personal/create', [PersonalController::class, 'create'])->name('createPersonal');
Route::post('/personal/store', [PersonalController::class, 'store'])->name('storePersonal');

