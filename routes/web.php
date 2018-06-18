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
Route::get('/iframe', function () {
    return view('welcome');
});


Route::get('/acuerdo/{id}','AcusacionController@acuerdoInicio')->name('acuerdo-inicio');
Route::get('/acuerdo-inicio/{id}','AcusacionController@acuerdoDocumento')->name('acuerdo-documento');

Route::get('/pruebas/caso','PruebasController@create');
Route::get('/pruebas/hechos','PruebasController@hechos');
Route::get('/pruebas/delitos','PruebasController@delitos');
Route::get('/pruebas/impresion','PruebasController@impresion');
Route::get('/pruebas/alfred','PruebasController@alfred');

Route::get('/libro-acta', function(){
    return view('tables.libro-actas');
});

Route::get('/pruebaMedidas', function () {
    return view('forms.medidasProteccion');
});
Route::get('/pruebasconsulta', function(){
    return view('tables.consulta-actas');
});
Route::get('/formatos-pruebas', function(){
    return view('tables.formatos');
});
Route::get('/fiscales', 'PreregistroController@estadoFiscales')->name('disponibilidad.fiscal');


Route::get('/pruebasformatos', function(){
    return view('tables.formatos');
    });
    
Route::get('/pruebasactas','PruebasController@actas');
Route::get('/pruebasmetodo/{id}','PruebasController@pruebas');

Route::get('/impresion-Oficios','ImpresionesController@tablaOficios')->name('tabla.oficios');
Route::get('/oficio-distrito','ImpresionesController@oficioDistrito')->name('fiscal.distrito'); 
Route::get('fiscal/{id}', 'ImpresionesController@getfiscal')->name('get.fiscal');
Route::post('imprimir/Oficio-distrito','ImpresionesController@storeDistrito')->name('store.oficioDistrito');
Route::get('Datosfiscal/{id}', 'ImpresionesController@getDatos'); 


Route::get('policia-ministerial','ImpresionesController@policiaMinisterial')->name('policia.ministerial');
Route::get('oficio-ministerial','ImpresionesController@getMinisterial');
Route::get('transporte-estado','ImpresionesController@transporteEdo')->name('oficio.transporte');
Route::get('Oficiotransporte-estado','ImpresionesController@storeoficioTransporte')->name('storeoficio.Transporte');


Route::get('oficio-cavd','ImpresionesController@getCavd')->name('oficio.cavd');
Route::get('show-oficioCavd','ImpresionesController@showOficio')->name('show.oficioCavd');
Route::post('store-oficioCavd','ImpresionesController@storeOficio')->name('store.oficioCavd');
Route::get('getcavd/{id}','ImpresionesController@getCavd');


Route::get('not-actuaciones','ImpresionesController@notActuaciones')->name('not.actuaciones');
Route::get('impresion-actuaciones','ImpresionesController@impresionActuaciones')->name('impresion.actuaciones');

Route::get('impresion-archivoTemporal','ImpresionesController@archivoTemporal')->name('impresion.archivoTemporal');
Route::get('impresion-temporal','ImpresionesController@archivoTemporalImp')->name('impresion.temporal');


/* --------Ruta para obtener token oficios----------- */
// Route::get('getToken/{id}','ActasHechosController@getToken')->name('getToken');
// Route::get('oficioah/{id}','ActasHechosController@getoficioah')->name('oficioah');  
// Route::post('saveOficio','ActasHechosController@saveOficio')->name('saveOficio');
// Route::get('getoficioah2/{id}','ActasHechosController@getoficioah2')->name('getoficioah');


Route::post('oficios', 'OficioController@oficios')->name('oficios');
Route::post('getToken', 'OficioController@getToken')->name('getToken');
Route::post('saveOficio', 'OficioController@saveOficio')->name('saveOficio');
Route::post('intentos', 'OficioController@intentos')->name('intentos');
Route::get('getOficios', 'OficioController@getOficios')->name('getOficios');
Route::post('getOficio', 'OficioController@getOficio')->name('getOficio');
Route::post('addOficio', 'OficioController@addOficio')->name('addOficio');
Route::post('updateOficio', 'OficioController@updateOficio')->name('updateOficio');

Route::get('actaoficio/{id}', 'ActasHechosController@actaoficio')->name('actaoficio');
Route::get('getoficioah/{id}', 'ActasHechosController@getoficioah');


/**NO TOCAR***/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// ------------------------------------------------------------------
/*--------------------Ruta error en login----------------------------------*/
Route::get('errorlogin', 'RegisterController@errorlogin')->name('error.login');
//////////////////////////////////////////////////        
        
Route::middleware(['auth'])->group(function () {
            
    Route::get('/resumen', 'ResumenCarpetaController@showResumen')->name('carpeta.detalle');
    Route::get('/resumen-denunciante', 'ResumenCarpetaController@detalleDenunciante')->name('resumen.denunciante');
    Route::get('/resumen-denunciado', 'ResumenCarpetaController@detalleDenunciado')->name('resumen.denunciado');
    Route::get('/resumen-acusaciones', 'ResumenCarpetaController@detalleAcusaciones')->name('resumen.acusaciones');
    Route::get('/resumen-delito', 'ResumenCarpetaController@detalleDelito')->name('resumen.delito');
    Route::get('/resumen-abogado', 'ResumenCarpetaController@detalleAbogado')->name('resumen.abogado');
    Route::get('/resumen-autoridad', 'ResumenCarpetaController@detalleAutoridad')->name('resumen.autoridad');
    Route::get('/resumen-observaciones', 'ResumenCarpetaController@detalleObservaciones')->name('resumen.observaciones');
    Route::get('/resumen-defensa', 'ResumenCarpetaController@detalleDefensa')->name('resumen.defensa');
            
    
    /************Rutas para formulario de solicitante/victima/denunciante*************/
    Route::get('/crear-caso', 'CarpetaController@crearCaso')->name('inicio.caso');
    Route::get('cancelar-caso', 'CarpetaController@cancelarCaso')->name('cancelar.caso');
    Route::get('terminar', 'CarpetaController@terminar')->name('terminar.caso');
    Route::get('salir', 'CarpetaController@salirCaso')->name('salir.caso');
    //Route::post('storecarpeta', 'CarpetaController@storeCarpeta')->name('store.carpeta');
    //Route::get('/carpeta-inicial/{id}', 'CarpetaController@index')->name('carpeta');
    
    Route::get('agregar-denunciante', 'DenuncianteController@showForm')->name('new.denunciante');
    Route::post('storedenunciante', 'DenuncianteController@storeDenunciante')->name('store.denunciante');
    Route::get('agregar-denunciante/{id}/eliminar', 'DenuncianteController@delete')->name('delete.denunciante');
    Route::get('/atender/{id}', 'PreregistroAuxController@atender');
    Route::get('/turno/{id}', 'PreregistroAuxController@turno');
    Route::get('/Traerturno', 'PreregistroAuxController@Traerturno')->name('turno.denunciante');
    Route::get('/devolver/{id}', 'PreregistroAuxController@devolverturno')->name('devolver');
    /*****************************Rutas para modulo recepción****************************************/
    
    
    //Route::resource('/preregistro','PreregistroController');
    
    
    Route::post('/showbyfolio', 'PreregistroAuxController@showbyfolio');
    Route::get('/showbyfolio', 'PreregistroAuxController@showbyfolio');
    
    Route::get('/encola', 'PreregistroAuxController@encola');
    Route::get('/urgentes', 'PreregistroAuxController@urgentes')->name('urgentes');
    
    Route::post('/filtroprioridad', 'PreregistroAuxController@filtroPrioridad')->name('prioridadpreregistrofiltro');
    
    Route::get('/showbymunicipio/{id}', 'PreregistroAuxController@showbymunicipio')->name('showbymunicipio');
    Route::get('/estado/{id}/{tipo}', 'PreregistroController@estado');
    Route::post('/estado', 'PreregistroController@estadourgente')->name('estado');
    
    //Route::resource('/predenuncias','PreregistroAuxController');
    Route::get('/predenuncias', 'PreregistroAuxController@index')->name('predenuncias.index'); //ver formulario
    Route::get('/predenuncias/{id}/edit', 'PreregistroAuxController@edit')->name('predenuncias.edit'); //ver formulario
    Route::post('/predenuncias/{id}/update', 'PreregistroAuxController@update')->name('predenuncias.update'); //registar
    
    
    Route::get('/preregistroWeb/pre-auxiliar', 'PreregistroAuxController@create'); //ver formulario
    Route::post('/preregistroWeb', 'PreregistroAuxController@store'); //registar
    
    /*-----------------descripcion de Hechos------------------------------*/
    Route::get('observaciones', 'NarracionController@descripcionHechos')->name('observaciones');
    Route::post('storeDescripcionHechos', 'NarracionController@storeDescripcionHechos')->name('store.descripcionHechos');
    /*---------Rutas narración-------------*/
    Route::get('narracion/{id}', 'NarracionController@index')->name('narracion');
    Route::post('addnarracion/{id}', 'NarracionController@addNarracion')->name('new.narracion');
    Route::get('getnarracion/{id}', 'NarracionController@getNarracion')->name('getnarracion');
    Route::get('mostrardoc/{id}', 'NarracionController@mostrarDoc');
    /*---------Rutas denunciado-------------*/
    Route::get('agregar-denunciado', 'DenunciadoController@showForm')->name('new.denunciado');
    Route::post('storedenunciado', 'DenunciadoController@storeDenunciado')->name('store.denunciado');
    Route::get('agregar-denunciado/{id}/eliminar', 'DenunciadoController@delete')->name('delete.denunciado');
    
    /*---------Rutas de preregistro orientador-------------*/
    Route::get('preregistros', 'PreregistroAuxController@orientador');
    
	
    /*---------Rutas para las notificaciones-------------*/
    Route::get('notificaciones', 'NotificacionesController@getNotificacionesCola')->name("notificaciones");
    
    /*---------Rutas Registros Orientador-------------*/
    Route::get('registros', 'RegistrosCasoController@lista');
    Route::post('registrosfiltro', 'RegistrosCasoController@listafiltro');
    Route::get('registros/{id}/edit', 'RegistrosCasoController@editRegistros');
    Route::post('/buscarfolio', 'RegistrosCasoController@buscarfolio');
    Route::get('/buscarfolio', 'RegistrosCasoController@buscarfolio');
    Route::get('/buscarmunicipio/{id}', 'RegistrosCasoController@buscarmunicipio')->name('buscarmunicipio');
    Route::put('storeregistro/{id}', 'RegistrosCasoController@updateregistros')->name('put.registro');
    
    /*---------Rutas Agregar Preregistro Controller------------*/
    
    Route::get('recepcionista','PreregistroController@fiscal');
    Route::post('/recepcionista/create','PreregistroController@fiscalcreate')->name('fiscal');
    
    
    
    /*---------Atención rápida------------*/
    Route::get('atencion', 'AtencionController@index');
    Route::post('addatencion', 'AtencionController@addAtencion')->name('addatencion');
    
    /*---------Medidas de protección------------*/
    Route::get('medidas', 'MedidasProteccionController@index')->name('medidas');
    Route::post('addMedidas', 'MedidasProteccionController@addMedidas')->name('addMedidas');
    Route::get('getMedidas', 'MedidasProteccionController@getMedidas')->name('getMedidas');
    // Route::get('deleteMedida/{id}', 'MedidasProteccionController@deleteMedida')->name('deleteMedida');
    Route::get('agregar-medidas/{id}/eliminar', 'MedidasProteccionController@delete')->name('delete.medida');
    Route::post('agregar-medidas/editar', 'MedidasProteccionController@editar')->name('agregar-medidas');
    Route::get('getMedidasAjax/{id}', 'MedidasProteccionController@getMedidasAjax')->name("getMedidasAjax");
    Route::get('getoficio/{id}','MedidasProteccionController@oficio');
    
    
    /*----------------medidas version2------------------*/
    // Route::get('medidas2', 'MedidasController@index')->name('medidas2');
    // Route::post('addMedidas2', 'MedidasController@addMedidas2')->name('addMedidas2');
    // Route::get('getMedidas2', 'MedidasController@getMedidas2')->name('getMedidas2');
    
    
    /*---------Rutas  Delitos Controller------------*/
    Route::get('agregar-delito', 'DelitoController@showForm')->name('new.delito');
    Route::post('storedelito', 'DelitoController@storeDelito')->name('store.delito');
    Route::get('delito/{id}/eliminar', 'DelitoController@delete')->name('delete.delito');
    Route::get('editar/{id}', 'DelitoController@editar')->name('editar');
    Route::put('delito/{id}/actualizar', 'DelitoController@actualizar')->name('actualizar.delito');
    /*---------Rutas para obtener delitos y desagregaciones------------*/
    Route::get('agrupaciones1/{id}', 'DelitoController@getAgrupaciones1')->name('get.agregacion1');
    Route::get('agrupaciones2/{id}', 'DelitoController@getAgrupaciones2')->name('get.agregacion2');
    
    Route::get('acusacion', 'AcusacionController@showForm')->name('new.acusacion');
    Route::post('storeacusacion', 'AcusacionController@storeAcusacion')->name('store.acusacion');
    Route::get('agregar-acusacion/{id}/eliminar', 'AcusacionController@delete')->name('delete.acusacion');
    
    /* --------Rutas para abogado----------- */
    Route::get('agregar-abogado', 'AbogadoController@showForm')->name('new.abogado');
    Route::post('storeabogado', 'AbogadoController@storeAbogado')->name('store.abogado');
    Route::get('agregar-abogado/{id}/eliminar', 'AbogadoController@delete')->name('delete.abogado');
    
    
    /* --------Rutas para defensa----------- */
    Route::get('agregar-defensa', 'AbogadoController@showForm2')->name('new.defensa');
    Route::post('storedefensa', 'AbogadoController@storeDefensa')->name('store.defensa');
    // Route::get('agregar-defensa/{id}/eliminar', 'AbogadoController@delete');
    
    
    Route::get('involucrados/{idAbogado}', 'AbogadoController@getInvolucrados')->name('getinvolucrados');
    /* --------Rutas para Autoridad----------- */
    Route::get('agregar-autoridad', 'AutoridadController@showForm')->name('new.autoridad');
    Route::post('storeautoridad', 'AutoridadController@storeAutoridad')->name('store.autoridad');
    Route::get('agregar-autoridad/{id}/eliminar', 'AutoridadController@delete')->name('delete.autoridad');
    
    /* --------Rutas para Turnar----------- */
    Route::get('turnar/{id}','EstadoController@index');
    Route::post('/turnar/actualizar','EstadoController@editar')->name('estado.edit');
    
    /* --------Rutas para Actas de hechos----------- */
    Route::get('actas','ActasHechosController@showform')->name('new.actahechos');
    Route::post('addactas','ActasHechosController@addActas')->name('addactas');
    Route::post('addactas2','ActasHechosController@addActas2')->name('addactas2');
    Route::get('actas-pendientes','ActasHechosController@actasPendientes')->name('actaspendientes');
    Route::get('listaActas', 'ActasHechosController@showActas');
    Route::get('atender-acta/{id}','ActasHechosController@actasPreregistro')->name('actaspreregistro');
    Route::post('/filtroactas', 'ActasHechosController@filtroactas');
    Route::get('/filtroactas', 'ActasHechosController@filtroactas');
    Route::get('/descActas/{id}', 'ActasHechosController@descActas');
    
    Route::post('/folioActa', 'ActasHechosController@filtroActasPendientes')->name('filtroactapendiente');
    
    /* --------Rutas para Actas circunstanciadas----------- */
    Route::get('actacircunstanciada','ActaCircunstanciadaController@showform')->name('new.actacircunstanciada');
    Route::post('addactacircunstanciada','ActaCircunstanciadaController@addActaCirc')->name('addactaCirc');
    Route::get('getcircunstanciada/{id}','ActaCircunstanciadaController@getcircunstanciada');
    
    /* --------Rutas para Libro de gobierno----------- */
    Route::get('libro','libroGobController@terminadas');
    Route::get('getCarpetas','libroGobController@getCarpetas');
    Route::get('carpetas','libroGobController@buscar')->name('indexcarpetas');
    route::get('carpeta/{id}','ResumenCarpetaController@showForm')->name('ir.carpeta');
    Route::post('carpetaNum','libroGobController@searchNumCarpeta')->name('filtro.carpetas');
    Route::post('libroGobierno','libroGobController@mostrarlibro')->name('libro.filtro');
    /* --------Rutas para Caratula de carpeta de investigacion----------- */
    Route::get('caratula','CaratulaCarpetaController@crearCaratula')->name('caratula');
    Route::get('caratula-impresion','CaratulaCarpetaController@imprimirCaratula');
    
    
    /* --------Rutas para Periciales----------- */
    Route::get('periciales','pericialesController@pericialesindex');
    Route::post('periciales/agregar','pericialesController@agregar')->name('store.agregar');
    Route::post('periciales/psicologo','pericialesController@psico')->name('store.psicologo');
    Route::post('periciales/vehiculo','pericialesController@vehi')->name('store.vehiculo');
    Route::post('periciales/lesiones','pericialesController@lesiones')->name('store.lesiones');
    Route::get('getpericiales/{id}','pericialesController@getpericiales');
    Route::get('getpsico/{id}','pericialesController@getpsico');
    Route::get('getVh/{id}','pericialesController@getVh');
    Route::get('getlesion/{id}','pericialesController@getlesion');

     /* --------Pruebas vehiculos----------- */
    Route::get('/vehiculos-pruebas','VehiculoController@showform')->name('vehiculo.carpeta');
    Route::get('submarcas/{id}', 'VehiculoController@getSubmarcas')->name('get.submarcas');
    Route::get('tipoVehiculos/{id}', 'VehiculoController@getTipoVehiculos')->name('get.tipovehiculos');
    Route::post('store-vehiculo', 'VehiculoController@storeVehiculo')->name('carpeta.vehiculo');
    Route::get('getVehiculo/{id}', 'VehiculoController@getVh');

    /* -----------Ruta para Libro de Oficios------------ */
    Route::get('lista-oficios','LibroOficioController@IndexOfi');
    Route::post('/filtro', 'LibroOficioController@filtroactas');
    Route::get('/filtro', 'LibroOficioController@filtroactas');  
    
    /* -----------Ruta para cambio de rol------------ */
    Route::get('rol','RegisterController@cambioRol')->name('cambioRol');  

});


// ///////////////////////////////////////preregistro/////////////////////////
Route::get('/preregistro', 'PreregistroController@create')->name('preregistro.create'); //ver formulario
Route::post('/preregistro/store', 'PreregistroController@store')->name('preregistro.store'); //registar

/*--------------------Rutas para generar el RFC----------------------------------*/
Route::post('rfc-moral', 'PreregistroAuxController@rfcMoral')->name('rfc.moral');
Route::post('rfc-fisico', 'PreregistroAuxController@rfcFisico')->name('rfc.fisico');

/*---------correo------------*/
Route::get('correo', 'PreregistroAuxController@boton');
//Route::post('correo/enviar', 'PreregistroAuxController@enviar')->name('correo');
Route::post('enviar/correo', 'PreregistroController@enviar')->name('envio');

/*---------Rutas para los selects dinámicos-------------*/
Route::get('municipios/{id}', 'RegisterController@getMunicipios')->name('get.municipio');
Route::get('localidades/{id}', 'RegisterController@getLocalidades')->name('get.localidad');
Route::get('codigos/{id}', 'RegisterController@getCodigos')->name('get.codigo');
Route::get('colonias/{cp}', 'RegisterController@getColonias')->name('get.colonia');
Route::get('colonias2/{id}', 'RegisterController@getColonias2')->name('get.colonia2');
Route::get('codigos2/{id}', 'RegisterController@getCodigos2')->name('get.codigo2');

/********************generar pdf**********************************/

Route::get('FormatoRegistro/{id}', 'PdfController@datos');
