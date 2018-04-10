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
/*******************Rutas para probar vistas*************************** */
Route::get('/prueba', function () {
    return view('welcome');
});
/**********************Rutas de prueba***********************/
Route::get('/pruebas/caso','PruebasController@create');
Route::get('/pruebas/hechos','PruebasController@hechos');
Route::get('/pruebas/delitos','PruebasController@delitos');

Route::get('/pruebasIndex', function(){
return view('prueba-index');

});

Route::get('/pruebaMedidas', function () {
    return view('forms.medidasProteccion');
});
/**************************************************************/
// -------------------------------------------------------------------


/**NO TOCAR***/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// ------------------------------------------------------------------

/********************generar pdf**********************************/

Route::get('FormatoRegistro/{id}', 'PdfController@datos');

/************Rutas para formulario de solicitante/victima/denunciante*************/
Route::get('/crear-caso', 'DenuncianteController@crearCaso')->name('inicio');
//Route::post('storecarpeta', 'CarpetaController@storeCarpeta')->name('store.carpeta');
//Route::get('/carpeta-inicial/{id}', 'CarpetaController@index')->name('carpeta');

Route::get('agregar-denunciante', 'DenuncianteController@showForm')->name('new.denunciante');
Route::get('cancelar-caso', 'DenuncianteController@cancelarCaso')->name('cancelar.caso');
Route::post('storedenunciante', 'DenuncianteController@storeDenunciante')->name('store.denunciante');
Route::get('/atender/{id}', 'PreregistroAuxController@atender');
Route::get('/turno/{id}', 'PreregistroAuxController@turno');
Route::get('/Traerturno', 'PreregistroAuxController@Traerturno')->name('turno.denunciante');
Route::get('/devolver/{id}', 'PreregistroAuxController@devolverturno')->name('devolver');
/*****************************Rutas para modulo recepción****************************************/
	

Route::resource('/preregistro','PreregistroController');
Route::post('/showbyfolio', 'PreregistroAuxController@showbyfolio');
Route::get('/showbyfolio', 'PreregistroAuxController@showbyfolio');
Route::get('/showbymunicipio/{id}', 'PreregistroAuxController@showbymunicipio');
Route::get('/encola', 'PreregistroAuxController@encola');
Route::get('/urgentes', 'PreregistroAuxController@urgentes');

Route::resource('/predenuncias','PreregistroAuxController');


Route::get('/preregistroWeb/pre-auxiliar', 'PreregistroAuxController@create'); //ver formulario
Route::post('/preregistroWeb', 'PreregistroAuxController@store'); //registar

/*---------Rutas narración-------------*/
Route::get('narracion', 'NarracionController@index')->name('narracion');
Route::post('addnarracion', 'NarracionController@addNarracion');
Route::get('getnarracion/{id}', 'NarracionController@getNarracion');
Route::get('mostrardoc/{id}', 'NarracionController@mostrarDoc');
/*---------Rutas denunciado-------------*/
Route::get('denunciado', 'DenunciadoController@index')->name('carpeta');
Route::get('adddenunciado', 'DenunciadoController@addDenunciado')->name('adddenunciado');

/*---------Rutas de preregistro orientador-------------*/
Route::get('preregistros', 'PreregistroAuxController@orientador');
/*---------Rutas para los selects dinámicos-------------*/

Route::get('municipios/{id}', 'RegisterController@getMunicipios');
Route::get('localidades/{id}', 'RegisterController@getLocalidades');
Route::get('codigos/{id}', 'RegisterController@getCodigos');
Route::get('colonias/{cp}', 'RegisterController@getColonias');

/*---------Rutas para las notificaciones-------------*/
Route::get('notificaciones', 'NotificacionesController@getNotificacionesCola');

/*---------Rutas Registros Orientador-------------*/
Route::get('registros', 'RegistrosCasoController@lista');
Route::get('registros/{id}/edit', 'RegistrosCasoController@editRegistros');
Route::post('/buscarfolio', 'RegistrosCasoController@buscarfolio');
Route::get('/buscarfolio', 'RegistrosCasoController@buscarfolio');
Route::get('/buscarmunicipio/{id}', 'RegistrosCasoController@buscarmunicipio');
Route::put('storeregistro/{id}', 'RegistrosCasoController@updateregistros')->name('put.registro');

/*---------Rutas Agregar Preregistro Controller------------*/

Route::get('recepcionista','PreregistroController@fiscal');
Route::post('/recepcionista/create','PreregistroController@fiscalcreate')->name('fiscal');


/*---------correo------------*/
Route::get('correo', 'PreregistroAuxController@boton');
//Route::post('correo/enviar', 'PreregistroAuxController@enviar')->name('correo');
Route::post('enviar/correo', 'PreregistroController@enviar')->name('envio');


/*---------Atención rápida------------*/
Route::get('atencion', 'AtencionController@index');
Route::post('addatencion', 'AtencionController@addAtencion')->name('addatencion');

/*---------Medidas de protección------------*/
Route::get('medidas', 'MedidasProteccionController@index');
Route::post('addMedidas', 'MedidasProteccionController@addMedidas')->name('addMedidas');