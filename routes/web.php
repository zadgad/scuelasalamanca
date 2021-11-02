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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/prueba', [App\Http\Controllers\index::class, 'prueba'])->name('prueba');
 Route::get('/login', [App\Http\Controllers\registro::class, 'viewlogin'])->name('login');
Route::get('/home', [App\Http\Controllers\index::class, 'index'])->name('home');
Route::get('/registro/formulario', [App\Http\Controllers\registro::class, 'viewregistro'])->name('register');
Route::post('/registro/insertar', [App\Http\Controllers\registro::class, 'store'])->name('registrar');
Route::post('/registro/iniciar', [App\Http\Controllers\loginController::class, 'login'])->name('iniciar');
Route::get('/supremoini/{id}', [App\Http\Controllers\index::class, 'user'])->name('inicio');
Route::get('/usuario/{id}', [App\Http\Controllers\index::class, 'usuario'])->name('inius');
Route::get('/home/{id}', [App\Http\Controllers\inicio::class, 'index'])->name('inihome');
Route::get('/logout/session', [App\Http\Controllers\loginController::class, 'logout'])->name('logout');
Route::get('/informacion/user/{id}', [App\Http\Controllers\UsrController::class, 'info'])->name('infoRut');

Route::get('/ususer/{id}', [App\Http\Controllers\User::class, 'index'])->name('iniUS');
Route::get('/home/empleados/{id}', [App\Http\Controllers\Empleados::class, 'index'])->name('inicioEm');

Route::get('/RegistroUs/{id}',[App\Http\Controllers\UsrController::class, 'reDisct'])->name('regists');
Route::get('/FormulariAD',[App\Http\Controllers\UsrController::class, 'form'])->name('formulario');

Route::get('/ListaUserWold',[App\Http\Controllers\UsrController::class, 'listU'])->name('listUS');
Route::get('/ListUserEmp',[App\Http\Controllers\UsrController::class, 'listE'])->name('list_em');
Route::get('/ListUserAdm',[App\Http\Controllers\UsrController::class, 'listA'])->name('list_ad');
Route::get('/ListUserUs',[App\Http\Controllers\UsrController::class, 'listUs'])->name('list');
Route::get('/ListUserEstu',[App\Http\Controllers\UsrController::class, 'listestud'])->name('listEstu');

Route::get('/usuarios',[App\Http\Controllers\UsrController::class, 'index'])->name('list_us');
Route::post('/usuarsI',[App\Http\Controllers\UsrController::class, 'insertar'])->name('insertar');
Route::post('/userInsert/{id}',[App\Http\Controllers\UsrController::class, 'insertar2'])->name('insertar2');
Route::get('/userUser/{id}',[App\Http\Controllers\UsrController::class, 'editarUs'])->name('editaruser');
Route::put('/editarU/{id}',[App\Http\Controllers\UsrController::class, 'editUs'])->name('editarUs');
Route::put('/editar/user/{id}',[App\Http\Controllers\UsrController::class, 'editarU'])->name('edit');
Route::put('/editar/us/{id}',[App\Http\Controllers\UsrController::class, 'editarPas'])->name('editP');


Route::get('/formulario/gestion',[App\Http\Controllers\escuelaController::class, 'formgestion'])->name('addgestion');
Route::put('/insertgestion/gestion',[App\Http\Controllers\escuelaController::class, 'insertges'])->name('insertgestion');
Route::get('/tablagestiones',[App\Http\Controllers\escuelaController::class, 'tablasg'])->name('tabgestion');
Route::get('/editar_gestion/{id}',[App\Http\Controllers\escuelaController::class, 'edtablagest'])->name('editargest');
Route::get('/cursos_gestion/{id}',[App\Http\Controllers\escuelaController::class, 'tablacursos'])->name('cursosges');

Route::get('/Estudiante/Registo/inicial/nuevo',[App\Http\Controllers\UsrController::class, 'formuini'])->name('curinicial');
Route::get('/Estudiante/Registo/inicial/familia',[App\Http\Controllers\UsrController::class, 'forminifa'])->name('curinifamiliar');
Route::get('/Estudiante/Registo/curso/nuevo',[App\Http\Controllers\UsrController::class, 'estunuevo'])->name('estudnuevo');
Route::get('/Estudiante/Registo/curso/familiar',[App\Http\Controllers\UsrController::class, 'estufami'])->name('estudfamilia');
Route::put('/Estudiante/Registo/curso/estudiante',[App\Http\Controllers\escuelaController::class, 'estudicurso'])->name('cursotabla');

Route::post('/Estudiante/Insertar/inicial/nuevo',[App\Http\Controllers\UsrController::class, 'insertinicial'])->name('registinic');
Route::post('/Estudiante/Insertar/inicial/familiar',[App\Http\Controllers\UsrController::class, 'insertinifami'])->name('registinifami');
Route::put('/Estudiante/Insertar/curso/nuevo',[App\Http\Controllers\UsrController::class, 'insertnuevo'])->name('registnuevo');
Route::put('/Estudiante/Insertar/curso/familiar',[App\Http\Controllers\UsrController::class, 'insertnuevfami'])->name('registnuevofami');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

// Route::group(['middleware' => 'auth'], function () {
// 	Route::get('table-list', function () {
// 		return view('pages.table_list');
// 	})->name('table');

// 	Route::get('typography', function () {
// 		return view('pages.typography');
// 	})->name('typography');

// 	Route::get('icons', function () {
// 		return view('pages.icons');
// 	})->name('icons');

// 	Route::get('map', function () {
// 		return view('pages.map');
// 	})->name('map');

// 	Route::get('notifications', function () {
// 		return view('pages.notifications');
// 	})->name('notifications');

// 	Route::get('rtl-support', function () {
// 		return view('pages.language');
// 	})->name('language');

// 	Route::get('upgrade', function () {
// 		return view('pages.upgrade');
// 	})->name('upgrade');
// });

// Route::group(['middleware' => 'auth'], function () {
// 	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
// 	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
// 	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
// 	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
// });

