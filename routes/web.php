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







Route::get("trabajadores", "TrabajadorController@index")
		->name("trabajadores.index");

Route::post("trabajadores", "TrabajadorController@store")
		->name("trabajadores.store");

Route::get("trabajadores/create", "TrabajadorController@create")
		->name("trabajadores.create");

Route::get("trabajadores/{id}", "TrabajadorController@show")
		->name("trabajadores.show");

Route::get("trabajadores/{id}/edit", "TrabajadorController@edit")
		->name("trabajadores.edit");

Route::put("trabajadores/create", "TrabajadorController@update")
		->name("trabajadores.update");

Route::delete("trabajadores/{id}", "TrabajadorController@delete")
		->name("trabajadores.delete");


// Route::resource("trabajadores", "TrabajadorController@index");


// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);