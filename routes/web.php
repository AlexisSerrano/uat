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
Route::get('/', function () {
    return redirect('home');
});
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
Route::get('/pruebasconsulta', function(){
    return view('tables.consulta-actas');
    
    });
    Route::get('/pruebaslibro', function(){
        return view('forms.libro-gobierno');
        });
        Route::get('/pruebasactas','PruebasController@actas');
        
    
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
Route::get('agregar-denunciante/{id}/eliminar', 'DenuncianteController@delete');
Route::get('/atender/{id}', 'PreregistroAuxController@atender');
Route::get('/turno/{id}', 'PreregistroAuxController@turno');
Route::get('/Traerturno', 'PreregistroAuxController@Traerturno')->name('turno.denunciante');
Route::get('/devolver/{id}', 'PreregistroAuxController@devolverturno')->name('devolver');
/*****************************Rutas para modulo recepción****************************************/


//Route::resource('/preregistro','PreregistroController');

Route::get('/preregistro', 'PreregistroController@create')->name('preregistro.create'); //ver formulario
Route::post('/preregistro/store', 'PreregistroController@store')->name('preregistro.store'); //registar



Route::post('/showbyfolio', 'PreregistroAuxController@showbyfolio');
Route::get('/showbyfolio', 'PreregistroAuxController@showbyfolio');
Route::get('/showbymunicipio/{id}', 'PreregistroAuxController@showbymunicipio');
Route::get('/encola', 'PreregistroAuxController@encola');
Route::get('/urgentes', 'PreregistroAuxController@urgentes');
Route::get('/estado/{id}/{tipo}', 'PreregistroController@estado');
Route::post('/estado', 'PreregistroController@estadourgente');

//Route::resource('/predenuncias','PreregistroAuxController');
Route::get('/predenuncias', 'PreregistroAuxController@index')->name('predenuncias.index'); //ver formulario
Route::get('/predenuncias/{id}/edit', 'PreregistroAuxController@edit')->name('predenuncias.edit'); //ver formulario
Route::post('/predenuncias/{id}/update', 'PreregistroAuxController@update')->name('predenuncias.update'); //registar


Route::get('/preregistroWeb/pre-auxiliar', 'PreregistroAuxController@create'); //ver formulario
Route::post('/preregistroWeb', 'PreregistroAuxController@store'); //registar

/*---------Rutas narración-------------*/
Route::get('narracion', 'NarracionController@index')->name('narracion');
Route::post('addnarracion', 'NarracionController@addNarracion');
Route::get('getnarracion/{id}', 'NarracionController@getNarracion');
Route::get('mostrardoc/{id}', 'NarracionController@mostrarDoc');
/*---------Rutas denunciado-------------*/
Route::get('agregar-denunciado', 'DenunciadoController@showForm')->name('new.denunciado');
Route::post('storedenunciado', 'DenunciadoController@storeDenunciado')->name('store.denunciado');
Route::get('agregar-denunciado/{id}/eliminar', 'DenunciadoController@delete');

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
Route::get('medidas', 'MedidasProteccionController@index')->name('medidas');
Route::post('addMedidas', 'MedidasProteccionController@addMedidas')->name('addMedidas');
Route::get('getMedidas', 'MedidasProteccionController@getMedidas')->name('getMedidas');
// Route::get('deleteMedida/{id}', 'MedidasProteccionController@deleteMedida')->name('deleteMedida');
Route::get('agregar-medidas/{id}/eliminar', 'MedidasProteccionController@delete');
Route::post('agregar-medidas/editar', 'MedidasProteccionController@editar');


/*---------Rutas  Delitos Controller------------*/
Route::get('agregar-delito', 'DelitoController@showForm')->name('new.delito');
Route::post('storedelito', 'DelitoController@storeDelito')->name('store.delito');
Route::get('agregar-delito/{id}/eliminar', 'DelitoController@delete');

Route::get('acusacion', 'AcusacionController@showForm')->name('new.acusacion');
Route::post('storeacusacion', 'AcusacionController@storeAcusacion')->name('store.acusacion');
Route::get('agregar-acusacion/{id}/eliminar', 'AcusacionController@delete');

/* --------Rutas para abogado----------- */
Route::get('agregar-abogado', 'AbogadoController@showForm')->name('new.abogado');
Route::post('storeabogado', 'AbogadoController@storeAbogado')->name('store.abogado');
Route::get('agregar-abogado/{id}/eliminar', 'AbogadoController@delete');


/* --------Rutas para defensa----------- */
Route::get('agregar-defensa', 'AbogadoController@showForm2')->name('new.defensa');
Route::post('storedefensa', 'AbogadoController@storeDefensa')->name('store.defensa');
// Route::get('agregar-defensa/{id}/eliminar', 'AbogadoController@delete');


Route::get('involucrados/{idCarpeta}/{idAbogado}', 'AbogadoController@getInvolucrados');
/* --------Rutas para Autoridad----------- */
Route::get('agregar-autoridad', 'AutoridadController@showForm')->name('new.autoridad');
Route::post('storeautoridad', 'AutoridadController@storeAutoridad')->name('store.autoridad');
Route::get('agregar-autoridad/{id}/eliminar', 'AutoridadController@delete');

/* --------Rutas para Turnar----------- */
Route::get('cestado','EstadoController@index');
Route::put('/cestado/actualizar','EstadoController@editar')->name('Estado.edit');

/* --------Rutas para Actas de hechos----------- */
Route::get('actas','ActasHechosController@showform')->name('new.actahechos');
Route::post('addactas','ActasHechosController@addActas')->name('addactas');
Route::get('actas-pendientes','ActasHechosController@actasPendientes')->name('actaspendientes');
Route::get('listaActas', 'ActasHechosController@showActas');

/* --------Rutas para Libro de gobierno----------- */
Route::get('libro','libroGobController@terminadas');
Route::get('getCarpetas','libroGobController@getCarpetas');
Route::get('carpetas','libroGobController@index');
Route::get('buscarcarpeta','libroGobController@buscar');
