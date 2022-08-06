<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/inicio', 'HomeController@index')->name('inicio');
Route::get('/abogados', 'abogadosController@index')->name('abogados');
Route::post('/crear_abogado', 'abogadosController@create')->name('crear_abogado');
Route::post('update_abogado/{id}', 'abogadosController@update')->name('update_abogado');
Route::get('/trm', 'abogadosController@trm')->name('trm');
Route::get('/casos', 'casosController@index')->name('casos');
Route::post('/crear_caso', 'casosController@create')->name('crear_caso');
Route::post('update_caso/{id}', 'casosController@update')->name('update_caso');

Route::get('/clientes', 'clientesController@index')->name('clientes');
Route::post('/crear_cliente', 'clientesController@create')->name('crear_cliente');
Route::post('update_cliente/{id}', 'clientesController@update')->name('update_cliente');
