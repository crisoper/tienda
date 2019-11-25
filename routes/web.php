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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('personas', 'PersonaController');



Route::resource('productos', 'ProductoController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('dbraw', 'PersonaController@dbraw');

Route::get('dbinsert', 'PersonaController@dbinsert');

Route::get('dbdelete', 'PersonaController@dbdelete');

Route::get('dbupdate', 'PersonaController@dbupdate');


//Creando la ruta para mostrar formulario de subir foto
Route::get('personas/{persona}/subirfoto', 'PersonaController@subirfoto')->name('personas.subirfoto');
Route::put('personas/{persona}/subirfoto', 'PersonaController@storesubirfoto')->name('personas.storesubirfoto');

//Exportar Lista de Personas
Route::post('/exportar/personas', 'PersonaController@exportar')->name('personas.exportar');

//Exportar personas a PDF
Route::post('/exportar/imprimirpdf', 'PersonaController@imprimirpdf')->name('personas.imprimir');

// Subir archivos desde un formulario
Route::post('/uploads', 'StorageController@save');