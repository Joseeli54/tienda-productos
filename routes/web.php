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
Route::post('/almacen','AlmacenController@crearAlmacen');
Route::resource('almacenes', 'AlmacenController');
Route::resource('productos', 'ProductController');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

