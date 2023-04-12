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

// Route::get('/', function () {
//     return view('welcome');
// });


// Rutas para el login y registro...
Route::view('login','auth.login')->middleware('guest')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::view('register', 'auth.register')->name('register');
Route::post('register', 'Auth\RegisterController@create')->name('register');
Auth::routes();

//Rutas para crear, modificar, eliminar y buscar el almacen


//Almacenes
Route::resource('almacen', 'AlmacenController');
Route::get('almacen', 'AlmacenController@index')->name('almacen');
Route::delete('/deletealmacen/{id}', 'AlmacenController@deleteAlmacen')->name('deletealmacen');
Route::post('/crearalmacen','AlmacenController@crearAlmacen');

//Productos
Route::resource('productos', 'ProductController');
Route::get('productos', 'ProductController@index')->name('productos');

//Marcas
Route::resource('marcas', 'MarcaController');
Route::get('marcas', 'MarcaController@index')->name('marcas');

//Unidad Medida
Route::resource('unidadmedida', 'UnidadMedidaController');
Route::get('unidadmedida', 'UnidadMedidaController@index')->name('unidadmedida');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

