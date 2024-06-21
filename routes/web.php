<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AtencionesController;
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
use App\Http\Controllers\BlockTimeController;
use App\Http\Controllers\BlockDayController;
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

Route::get('/mascotas/{mascota}/historial', [MascotasController::class, 'historial'])->name('historialMascota');

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



//Route::get('/registroTutor', [TutorController::class, 'create'])->name('registroTutor');
Route::get('/tutor/create', [TutorController::class, 'create'])->name('createTutorAdmin');
Route::post('/tutor/store', [TutorController::class, 'store'])->name('storeTutor');
Route::get('/tutor/{id}/edit', [TutorController::class, 'edit'])->middleware(['auth','roltutor'])->name('editTutor');
Route::post('/tutor/{tutor}/update', [TutorController::class, 'update'])->middleware(['auth','roltutor'])->name('updateTutor');




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

Route::get('/horarios_ocupados', [SolicitudCitasController::class, 'getHorariosOcupados']);
//RUTAS DE PERSONAL

Route::get('/insumoIndex', [InsumoController::class, 'index'])->middleware(['auth','rolpersonal'])->name('insumoIndex');
Route::get('/insumo/create', [InsumoController::class, 'create'])->middleware(['auth','rolpersonal'])->name('createInsumo');
Route::post('/insumo/store', [InsumoController::class, 'store'])->middleware(['auth','rolpersonal'])->name('storeInsumo');
Route::get('/insumo/{insumo}/edit', [InsumoController::class, 'edit'])->middleware(['auth','rolpersonal'])->name('editInsumo');
Route::post('/insumo/{insumo}/update', [InsumoController::class, 'update'])->middleware(['auth','rolpersonal'])->name('updateInsumo'); 
Route::delete('/insumo/{id}', [InsumoController::class, 'destroy'])->name('destroyInsumo');
Route::get('/insumo/{id}/activate', [InsumoController::class, 'activate'])->middleware(['auth','rolpersonal'])->name('activeInsumo');

Route::get('/insumo/{insumo}/editInsumoAdmin', [InsumoController::class, 'editInsumoAdmin'])->name('editInsumoAdmin');
Route::post('insumo/{insumo}/updateInsumoAdmin', [InsumoController::class, 'updateInsumoAdmin'])->name('updateInsumoAdmin');
Route::get('/mascotaList', [MascotasController::class, 'list'])->middleware(['auth','rolpersonal'])->name('mascotaList');

Route::get('/tutoresList', [TutorController::class, 'list'])->middleware(['auth','rolpersonal'])->name('tutoresList');

Route::get('/perfilPersonal', [PersonalController::class, 'show'])->middleware(['auth','rolpersonal'])->name('perfilPersonal');
Route::post('/personal/{personal}/update', [PersonalController::class, 'update'])->middleware(['auth','rolpersonal'])->name('updatePersonal');

Route::get('/citasPersonal', [PersonalController::class, 'citas'])->middleware(['auth','rolpersonal'])->name('citasPersonal');

Route::get('/tutor/{id}/mascotas', [TutorController::class, 'mascotasTutor'])->middleware('auth','rolpersonal')->name('mascotasTutor');


Route::get('/atencion/create/{id}', [AtencionesController::class, 'create'])->name('createAtencion');
Route::post('/atencion/store', [AtencionesController::class, 'store'])->name('storeAtencion');

Route::post('/solicitud_citas/{id}/cancelar', [SolicitudCitasController::class, 'cancelar' ]);

//RUTAS DE ADMINISTRADOR

Route::get('/adminIndex', [AdminController::class, 'index'])->middleware(['auth','roladmin'])->name('adminIndex');
Route::get('/admin/create', [AdminController::class, 'create'])->middleware(['auth','roladmin'])->name('createAdmin');
Route::post('/admin/store', [AdminController::class, 'store'])->middleware(['auth','roladmin'])->name('storeAdmin');
Route::get('/admin/{admin}/edit', [AdminController::class, 'edit'])->middleware(['auth','roladmin'])->name('editAdmin');
Route::post('/admin/{admin}/update', [AdminController::class, 'update'])->middleware(['auth','roladmin'])->name('updateAdmin');

Route::get('/insumoIndexAdmin', [InsumoController::class, 'indexAdmin'])->middleware(['auth','roladmin'])->name('insumoIndexAdmin');
Route::get('/insumo/createAdmin', [InsumoController::class, 'createAdmin'])->middleware(['auth','roladmin'])->name('createInsumoAdmin');
Route::post('/insumo/storeAdmin', [InsumoController::class, 'storeAdmin'])->middleware(['auth','roladmin'])->name('storeInsumoAdmin');

Route::get('citasAdmin', [AdminController::class, 'citas'])->middleware(['auth','roladmin'])->name('citasAdmin');
//Route para utilizar el destroy de insumo
Route::delete('/insumoAdmin/{id}', [InsumoController::class, 'destroyAdmin'])->middleware(['auth','roladmin'])->name('destroyInsumoAdmin');
Route::get('/insumo/{id}/activateAdmin', [InsumoController::class, 'activateAdmin'])->middleware(['auth','roladmin'])->name('activeInsumoAdmin');


Route::get('/tipoAtencionIndex', [TipoAtencionController::class, 'index'])->middleware(['auth','roladmin'])->name('tipoAtencionIndex');
Route::get('/tipoAtencion/create', [TipoAtencionController::class, 'create'])->middleware(['auth','roladmin'])->name('createTipoAtencion');
Route::post('/tipoAtencion/store', [TipoAtencionController::class, 'store'])->middleware(['auth','roladmin'])->name('storeTipoAtencion');
Route::get('/tipoAtencion/{tipoAtencion}/edit', [TipoAtencionController::class, 'edit'])->middleware(['auth','roladmin'])->name('editTipoAtencion');
Route::post('/tipoAtencion/{tipoAtencion}/update', [TipoAtencionController::class, 'update'])->middleware(['auth','roladmin'])->name('updateTipoAtencion');

Route::get('/rolesIndex', [RolController::class, 'index'])->middleware(['auth','roladmin'])->name('rolesIndex');
Route::get('/roles/create', [RolController::class, 'create'])->middleware(['auth','roladmin'])->name('createRol');
Route::post('/roles/store', [RolController::class, 'store'])->middleware(['auth','roladmin'])->name('storeRol');
Route::get('/roles/{role}/edit', [RolController::class, 'edit'])->middleware(['auth','roladmin'])->name('editRol');
Route::post('/roles/{role}/update', [RolController::class, 'update'])->middleware(['auth','roladmin'])->name('updateRol');


Route::get('/comunaIndex', [ComunaController::class, 'index'])->middleware(['auth','roladmin'])->name('comunaIndex');
Route::get('/comuna/create', [ComunaController::class, 'create'])->middleware(['auth','roladmin'])->name('createComuna');
Route::post('/comuna/store', [ComunaController::class, 'store'])->middleware(['auth','roladmin'])->name('storeComuna');
Route::get('/comuna/{comuna}/edit', [ComunaController::class, 'edit'])->middleware(['auth','roladmin'])->name('editComuna');
Route::post('/comuna/{comuna}/update', [ComunaController::class, 'update'])->middleware(['auth','roladmin'])->name('updateComuna');

Route::get('/razamascotaIndex', [RazaMascotaController::class, 'index'])->middleware(['auth','roladmin'])->name('razamascotaIndex');
Route::get('/razamascota/create', [RazaMascotaController::class, 'create'])->middleware(['auth','roladmin'])->name('createRazaMascota');
Route::post('/razamascota/store', [RazaMascotaController::class, 'store'])->middleware(['auth','roladmin'])->name('storeRazaMascota');
Route::get('/razamascota/{razamascotum}/edit', [RazaMascotaController::class, 'edit'])->middleware(['auth','roladmin'])->name('editRazaMascota');
Route::post('/razamascota/{razamascotum}/update', [RazaMascotaController::class, 'update'])->middleware(['auth','roladmin'])->name('updateRazaMascota');

Route::get('/especialidadIndex', [EspecialidadController::class, 'index'])->middleware(['auth','roladmin'])->name('especialidadIndex');
Route::get('/especialidad/create', [EspecialidadController::class, 'create'])->middleware(['auth','roladmin'])->name('createEspecialidad');
Route::post('/especialidad/store', [EspecialidadController::class, 'store'])->middleware(['auth','roladmin'])->name('storeEspecialidad');
Route::get('/especialidad/{especialidad}/edit', [EspecialidadController::class, 'edit'])->middleware(['auth','roladmin'])->name('editEspecialidad');
Route::post('/especialidad/{especialidad}/update', [EspecialidadController::class, 'update'])->middleware(['auth','roladmin'])->name('updateEspecialidad');

Route::get('/usuarios',[UsuarioController::class,'index'])->middleware(['auth','roladmin'])->name('usuarios');


Route::get('/personal/{id}/edit', [PersonalController::class, 'edit'])->middleware(['auth','roladmin'])->name('editPersonal');

Route::get('/tutor/{id}/editTutorAdmin', [TutorController::class, 'editTutorAdmin'])->middleware(['auth','roladmin'])->name('editTutorAdmin');
Route::post('/tutor/{id}/updateTutorAdmin', [TutorController::class, 'updateTutorAdmin'])->middleware(['auth','roladmin'])->name('updateTutorAdmin');
Route::get('/personal/{id}/editPersonalAdmin', [PersonalController::class, 'editPersonalAdmin'])->middleware(['auth','roladmin'])->name('editPersonalAdmin');
Route::post('/personal/{id}/updatePersonalAdmin', [PersonalController::class, 'updatePersonalAdmin'])->middleware(['auth','roladmin'])->name('updatePersonalAdmin');
//Route::get('/editPersonalUser', [PersonalController::class, 'editUserView'])->name('editPersonalView');
Route::post('/updatePersonalUser', [PersonalController::class, 'UpdateUser'])->middleware(['auth','roladmin'])->name('updatePersonalUser');
Route::get('/personal/create', [PersonalController::class, 'create'])->middleware(['auth','roladmin'])->name('createPersonal');
Route::post('/personal/store', [PersonalController::class, 'store'])->middleware(['auth','roladmin'])->name('storePersonal');

Route::post('/blockTime', [BlockTimeController::class, 'store'])->name('blockTime');
Route::post('/blockDay', [BlockDayController::class, 'store'])->name('blockDay');
Route::post('/unblockDay', [BlockDayController::class, 'unblockDay'])->name('unblockDay');
Route::post('/unblockTime', [BlockTimeController::class, 'unblockTime'])->name('unblockTime');

