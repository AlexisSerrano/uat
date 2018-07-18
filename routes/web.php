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
    return redirect('home');
});
/*******************INICIO DE RUTAS PARA PROBAR VISTAS O METODOS*************************** */

// Route::get('/prueba', function () {
//     return view('welcome');
// });

// Route::get('/pruebasactas','PruebasController@actas');
// Route::get('/pruebasmetodo/{id}','PruebasController@pruebas');

// Route::get('/pruebas/caso','PruebasController@create');
// Route::get('/pruebas/hechos','PruebasController@hechos');
// Route::get('pruebas','PericialesController@getVhFinanzas');
// Route::get('/pruebas/impresion','PruebasController@impresion');
// Route::get('/pruebas/alfred','PruebasController@alfred');

// Route::get('/libro-acta', function(){
//     return view('tables.libro-actas');
// });

// Route::get('/pruebasf', function () {
//     return view('tables.pruebas');
// });
// Route::get('/pruebasconsulta', function(){
//     return view('tables.consulta-actas');
// });
// Route::get('/formatos-pruebas', function(){
//     return view('tables.formatos');
// });


// Route::get('/pruebasformatos', function(){
//     return view('tables.formatos');
// });

/**********************FIN RUTAS PARA PROBAR VISTAS O METODOS***********************/
/**NO TOCAR***/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// ------------------------------------------------------------------
/*--------------------Ruta error en login----------------------------------*/
Route::get('errorlogin', 'RegisterController@errorlogin')->name('error.login');
//////////////////////////////////////////////////        

Route::middleware(['auth'])->group(function () {


    Route::get('/impresion-Oficios/{id}','ImpresionesController@tablaOficios')->name('tabla.oficios')->middleware(['permission:tabla_oficios']);
    Route::get('/oficio-distrito','ImpresionesController@oficioDistrito')->name('fiscal.distrito')->middleware(['permission:fiscal_distrito']);
    Route::get('/oficio-funcion/{id}','ImpresionesController@docDistrito')->name('oficio.funcion')->middleware(['permission:oficio_funcion']); 
    Route::get('fiscal/{id}', 'ImpresionesController@getFiscal')->name('get.fiscal')->middleware(['permission:get_fiscal']);
    Route::post('imprimir/Oficio-distrito','ImpresionesController@storeDistrito')->name('store.oficioDistrito')->middleware(['permission:store_oficioDistrito']);
    Route::get('Datosfiscal/{id}', 'ImpresionesController@getDatos')->name('dato.fiscal.impresiones')->middleware(['permission:dato_fiscal_impresiones']);


    Route::get('policia-ministerial/{id}','ImpresionesController@policiaMinisterial')->name('policia.ministerial')->middleware(['permission:policia_ministerial']);
    Route::get('oficio-ministerial/{id}','ImpresionesController@getMinisterial')->middleware(['permission:datos_ministerial']);
    ///////////////////////////// oficio a direccion general de transporte del estado
    Route::get('transporte-estado/{id}','ImpresionesController@transporteEdo')->name('oficio.transporte')->middleware(['permission:oficio_transporte']);
    Route::get('Oficiotransporte-estado/{id}','ImpresionesController@storeoficioTransporte')->name('storeoficio.Transporte')->middleware(['permission:storeoficio_transporte']);


    Route::get('oficio-cavd/{id}','ImpresionesController@oficioCavd')->name('oficio.cavd')->middleware(['permission:oficio_cavd']);
    Route::get('show-oficioCavd','ImpresionesController@showOficio')->name('show.oficioCavd')->middleware(['permission:show_oficioCavd']);
    Route::post('store-oficioCavd','ImpresionesController@storeOficio')->name('store.oficioCavd')->middleware(['permission:store_oficioCavd']);
    Route::get('getcavd/{id}','ImpresionesController@getCavd')->name('datos.oficioCavd')->middleware(['permission:datos_oficioCavd']);


    Route::get('not-actuaciones/{id}','ImpresionesController@notActuaciones')->name('not.actuaciones')->middleware(['permission:not_actuaciones']);
    Route::get('impresion-actuaciones/{id}','ImpresionesController@impresionActuaciones')->name('impresion.actuaciones')->middleware(['permission:impresion_actuaciones']);
// archivo temporal
    Route::get('impresion-archivoTemporal/{id}','ImpresionesController@archivoTemporal')->name('impresion.archivoTemporal')->middleware(['permission:impresion_archivoTemporal']);
    Route::get('impresion-temporal/{id}','ImpresionesController@archivoTemporalImp')->name('impresion.temporal')->middleware(['permission:impresion_temporal']);

    Route::get('primera-invitacion','ImpresionesController@primeraInvitacion')->name('primera.invitacion')->middleware(['permission:primera_invitacion']);
    Route::get('impresion-invitacion','ImpresionesController@mostrarOficio')->name('show.invitacion')->middleware(['permission:show_invitacion']);
    Route::get('json-invitacion/{id}','ImpresionesController@getInvitacion')->name('datos.invitacion')->middleware(['permission:datos_invitacion']);

    Route::get('oficio-inicio/{id}','ImpresionesController@oficioInicio')->name('oficio.inicio')->middleware(['permission:oficio_inicio']);
    Route::get('impresion-inicio/{id}','ImpresionesController@impresionInicio')->name('impresion.acuerdoInicio')->middleware(['permission:impresion_acuerdoInicio']);

    Route::get('oficio-remision/{id}','ImpresionesController@docRemision')->name('oficio.remision')->middleware(['permission:oficio_remision']);
    Route::get('impresion-remision/{id}','ImpresionesController@getRemision')->name('impresion.remision')->middleware(['permission:impresion_remision']);

/***************************** formato de denuncia************************************/
    Route::get('formato-denuncia/{id}','ImpresionesController@formatoDenuncia')->name('formato.denuncia')->middleware(['permission:formato_denuncia']);
    Route::get('imprimir-denuncia/{id}','ImpresionesController@getFormatoDenuncia')->name('get.formatoDenuncia')->middleware(['permission:get_formatoDenuncia']);
    


    /* --------Ruta para obtener token oficios----------- */
    // Route::get('getToken/{id}','ActasHechosController@getToken')->name('getToken');
    // Route::get('oficioah/{id}','ActasHechosController@getoficioah')->name('oficioah');  
    // Route::post('saveOficio','ActasHechosController@saveOficio')->name('saveOficio');
    // Route::get('getoficioah2/{id}','ActasHechosController@getoficioah2')->name('getoficioah');



    
    /********MODULO DE OFICIOS***********/    
    Route::post('oficios', 'OficioController@oficios')->name('oficios')->middleware(['permission:oficios']);
    Route::post('getToken', 'OficioController@getToken')->name('getToken')->middleware(['permission:getToken']);
    Route::post('saveOficio', 'OficioController@saveOficio')->name('saveOficio')->middleware(['permission:saveOficio']);
    Route::post('intentos', 'OficioController@intentos')->name('intentos')->middleware(['permission:intentos']);
    Route::get('getOficios', 'OficioController@getOficios')->name('getOficios')->middleware(['permission:getOficios']);
    Route::post('getOficio', 'OficioController@getOficio')->name('getOficio')->middleware(['permission:getOficio']);
    Route::post('addOficio', 'OficioController@addOficio')->name('addOficio')->middleware(['permission:addOficio']);
    Route::post('updateOficio', 'OficioController@updateOficio')->name('updateOficio')->middleware(['permission:updateOficio']);

    /**-- acuerdo de inicio --**/
    Route::get('/acuerdo/{id}','AcusacionController@acuerdoInicio')->name('acuerdo-inicio')->middleware(['permission:acuerdo_inicio']);
    Route::get('/acuerdo-inicio/{id}','AcusacionController@acuerdoDocumento')->name('acuerdo-documento')->middleware(['permission:acuerdo_documento']);
    

    /**--interfaz para ver fiscales disponibres--**/
    Route::get('/fiscales', 'PreregistroController@estadoFiscales')->name('disponibilidad.fiscal')->middleware(['permission:disponibilidad_fiscal']);
    
    /***--resumen de la carpeta hunto con el historial de la carpeta--***/
    Route::get('/resumen', 'ResumenCarpetaController@showResumen')->name('carpeta.detalle')->middleware(['permission:carpeta_detalle']);
    Route::get('/resumen/denunciante', 'ResumenCarpetaController@detalleDenunciante')->name('resumen.denunciante')->middleware(['permission:resumen_denunciante']);
    Route::get('/resumen/denunciado', 'ResumenCarpetaController@detalleDenunciado')->name('resumen.denunciado')->middleware(['permission:resumen_denunciado']);
    Route::get('/resumen/acusaciones', 'ResumenCarpetaController@detalleAcusaciones')->name('resumen.acusaciones')->middleware(['permission:resumen_acusaciones']);
    Route::get('/resumen/delito', 'ResumenCarpetaController@detalleDelito')->name('resumen.delito')->middleware(['permission:resumen_delito']);
    Route::get('/resumen/abogado', 'ResumenCarpetaController@detalleAbogado')->name('resumen.abogado')->middleware(['permission:resumen_abogado']);
    Route::get('/resumen/autoridad', 'ResumenCarpetaController@detalleAutoridad')->name('resumen.autoridad')->middleware(['permission:resumen_autoridad']);
    Route::get('/resumen/defensa', 'ResumenCarpetaController@detalleDefensa')->name('resumen.defensa')->middleware(['permission:resumen_defensa']);
    Route::get('/resumen/vehiculos', 'ResumenCarpetaController@detalleVehiculo')->name('resumen.vehiculo')->middleware(['permission:resumen_vehiculo']);
    Route::get('/carpeta/historial', 'ResumenCarpetaController@detalleHistorial')->name('historial.carpeta')->middleware(['permission:historial_carpeta']);
    
    /**--control de la carpeta--**/
    Route::get('/crear-caso', 'CarpetaController@crearCaso')->name('inicio.caso')->middleware(['permission:inicio_caso']);
    Route::get('cancelar-caso', 'CarpetaController@cancelarCaso')->name('cancelar.caso')->middleware(['permission:cancelar_caso']);
    Route::get('terminar', 'CarpetaController@terminar')->name('terminar.caso')->middleware(['permission:terminar_Caso']);
    Route::get('salir', 'CarpetaController@salirCaso')->name('salir.caso')->middleware(['permission:salir_caso']);
    
    /************Rutas para formulario de solicitante/victima/denunciante*************/
    Route::get('agregar-denunciante', 'DenuncianteController@showForm')->name('new.denunciante')->middleware(['permission:new_denunciante']);
    Route::post('storedenunciante', 'DenuncianteController@storeDenunciante')->name('store.denunciante')->middleware(['permission:store_denunciante']);
    Route::get('agregar-denunciante/{id}/eliminar', 'DenuncianteController@delete')->name('delete.denunciante')->middleware(['permission:delete_denunciante']);
    
    /**control de turno para la carpeta**/
    Route::get('/atender/{id}', 'PreregistroAuxController@atender')->name('atender')->middleware(['permission:atender']);
    Route::get('/turno/{id}/{tipo}', 'PreregistroAuxController@turno')->name('tomar.turno')->middleware(['permission:tomar_turno']);
    Route::get('/Traerturno', 'PreregistroAuxController@Traerturno')->name('turno.denunciante')->middleware(['permission:turno_denunciante']);
    Route::get('/devolver/{id}', 'PreregistroAuxController@devolverturno')->name('devolver')->middleware(['permission:devolver']);
    
    /*****************************Rutas para modulo recepción****************************************/
    Route::post('/showbyfolio', 'PreregistroAuxController@showbyfolio')->middleware(['permission:post_showByfolio']);
    Route::get('/showbyfolio', 'PreregistroAuxController@showbyfolio')->middleware(['permission:get_showByfolio']);
    
    Route::get('/encola', 'PreregistroAuxController@encola')->name('en_cola')->middleware(['permission:en_cola']);
    Route::get('/urgentes', 'PreregistroAuxController@urgentes')->name('urgentes')->middleware(['permission:urgentes']);
    
    Route::post('/filtroprioridad', 'PreregistroAuxController@filtroPrioridad')->name('prioridadpreregistrofiltro')->middleware(['permission:prioridadpreregistrofiltro']);
    
    Route::get('/showbymunicipio/{id}', 'PreregistroAuxController@showbymunicipio')->name('showbymunicipio')->middleware(['permission:showbymunicipio']);
    Route::get('/estado/{id}/{tipo}', 'PreregistroController@estado')->name('datos_estado')->middleware(['permission:datos_estado']);
    Route::post('/estado', 'PreregistroController@estadourgente')->name('estado')->middleware(['permission:estado']);
    
    Route::get('/preregistros', 'PreregistroAuxController@index')->name('predenuncias.index')->middleware(['permission:predenuncias_index']); //ver formulario
    Route::get('/predenuncias/{id}/edit', 'PreregistroAuxController@edit')->name('predenuncias.edit')->middleware(['permission:predenuncias_edit']); //ver formulario
    Route::post('/predenuncias/{id}/update', 'PreregistroAuxController@update')->name('predenuncias.update')->middleware(['permission:predenuncias_update']); //registar
        
    Route::get('/preregistroWeb/pre-auxiliar', 'PreregistroAuxController@create')->name('ver.pre.aux')->middleware(['permission:ver_pre_aux']); //registar //ver formulario
    Route::post('/preregistroWeb', 'PreregistroAuxController@store')->name('create.pre.aux')->middleware(['permission:create_pre_aux']); //registar //registar
    
    /*-----------------descripcion de Hechos------------------------------*/
    Route::get('observaciones', 'NarracionController@descripcionHechos')->name('observaciones')->middleware(['permission:observaciones']);
    Route::post('storeDescripcionHechos', 'NarracionController@storeDescripcionHechos')->name('store.descripcionHechos')->middleware(['permission:store_descripcionHechos']);
    
    /*---------Rutas narración-------------*/
    Route::get('narracion/{id}', 'NarracionController@index')->name('narracion')->middleware(['permission:narracion']);
    Route::post('addnarracion/{id}', 'NarracionController@addNarracion')->name('new.narracion')->middleware(['permission:new_narracion']);
    Route::get('getnarracion/{id}', 'NarracionController@getNarracion')->name('getnarracion')->middleware(['permission:getnarracion']);
    Route::get('mostrardoc/{id}', 'NarracionController@mostrarDoc')->name('mostrar_doc')->middleware(['permission:mostrar_doc']);
    
    /*---------Rutas denunciado-------------*/
    Route::get('agregar-denunciado', 'DenunciadoController@showForm')->name('new.denunciado')->middleware(['permission:new_denunciado']);
    Route::post('storedenunciado', 'DenunciadoController@storeDenunciado')->name('store.denunciado')->middleware(['permission:store_denunciado']);
    Route::get('agregar-denunciado/{id}/eliminar', 'DenunciadoController@delete')->name('delete.denunciado')->middleware(['permission:delete_denunciado']);
    
    /*---------Rutas para las notificaciones-------------*/
    Route::get('notificaciones', 'NotificacionesController@getNotificacionesCola')->name('notificaciones')->middleware(['permission:notificaciones']);
    
    /*---------Rutas Registros Orientador-------------*/
    Route::get('registros', 'RegistrosCasoController@lista')->name('registros.orientador')->middleware(['permission:registros_orientador']);
    Route::post('registrosfiltro', 'RegistrosCasoController@listafiltro')->name('lista.filtro.orientador')->middleware(['permission:lista_filtro_orientador']);
    Route::get('registros/{id}/edit', 'RegistrosCasoController@editRegistros')->name('edit.registros.orientador')->middleware(['permission:edit_registros_orientador']);
    Route::post('/buscarfolio', 'RegistrosCasoController@buscarfolio')->name('buscar.folio.orientador.post')->middleware(['permission:buscar_folio_orientador_post']);
    Route::get('/buscarfolio', 'RegistrosCasoController@buscarfolio')->name('buscar.folio.orientador.get')->middleware(['permission:buscar_folio_orientador_get']);
    Route::get('/buscarmunicipio/{id}', 'RegistrosCasoController@buscarmunicipio')->name('buscarmunicipio')->middleware(['permission:buscarmunicipio']);
    Route::post('storeregistro/{id}', 'RegistrosCasoController@updateregistros')->name('put.registro')->middleware(['permission:put_registro']);
    
    /*---------Rutas Agregar Preregistro Controller------------*/
    
    Route::get('recepcionista','PreregistroController@fiscal')->name("index.preregistro")->middleware(['permission:index_preregistro']);
    Route::post('/recepcionista/create','PreregistroController@fiscalcreate')->name('fiscal')->middleware(['permission:fiscal']);
    
    /*---------Atención rápida------------*/
    Route::get('atencion', 'AtencionController@index')->name('index.atencion.rapida')->middleware(['permission:index_atencion_rapida']);
    Route::post('addatencion', 'AtencionController@addAtencion')->name('addatencion')->middleware(['permission:addatencion']);
    
    /*---------Medidas de protección------------*/
    Route::get('medidas', 'MedidasProteccionController@index')->name('medidas')->middleware(['permission:medidas']);
    Route::post('addMedidas', 'MedidasProteccionController@addMedidas')->name('addMedidas')->middleware(['permission:addMedidas']);
    Route::get('getMedidas', 'MedidasProteccionController@getMedidas')->name('getMedidas')->middleware(['permission:getMedidas']);
    Route::get('agregar-medidas/{id}/eliminar', 'MedidasProteccionController@delete')->name('delete.medida')->middleware(['permission:delete_medida']);
    Route::post('agregar-medidas/editar', 'MedidasProteccionController@editar')->name('agregar-medidas')->middleware(['permission:agregar_medidas']);
    Route::get('getMedidasAjax/{id}', 'MedidasProteccionController@getMedidasAjax')->name("getMedidasAjax")->middleware(['permission:getMedidasAjax']);
    Route::get('getoficio/{id}','MedidasProteccionController@oficio')->name('medida.oficio.datos')->middleware(['permission:medida_oficio_datos']);
    
    Route::get('medidaoficio/{id}', 'MedidasProteccionController@medidaoficio')->name('medidaoficio')->middleware(['permission:medidaoficio']);
    
    
    /*---------Rutas  Delitos Controller------------*/
    Route::get('agregar-delito', 'DelitoController@showForm')->name('new.delito')->middleware(['permission:new_delito']);
    Route::post('storedelito', 'DelitoController@storeDelito')->name('store.delito')->middleware(['permission:store_delito']);
    Route::get('delito/{id}/eliminar', 'DelitoController@delete')->name('delete.delito')->middleware(['permission:delete_delito']);
    // Route::get('editar/{id}', 'DelitoController@editar')->name('editar');
    // Route::put('delito/{id}/actualizar', 'DelitoController@actualizar')->name('actualizar.delito');
    /*---------Rutas para obtener delitos y desagregaciones------------*/
    Route::get('agrupaciones1/{id}', 'DelitoController@getAgrupaciones1')->name('get.agregacion1')->middleware(['permission:get_agregacion1']);
    Route::get('agrupaciones2/{id}', 'DelitoController@getAgrupaciones2')->name('get.agregacion2')->middleware(['permission:get_agregacion2']);

    /*----------------AJAX DELITO -------------*/
    Route::get('getDelitoAjax/{id}', 'DelitoController@getDelitoAjax')->name("getDelitoAjax")->middleware(['permission:getDelitoAjax']);
    Route::post('Delito/editar', 'DelitoController@editarDelito')->name("editar-Delito")->middleware(['permission:editar_delito']);


    /*------------------------------------------------------------*/
    Route::get('acusacion', 'AcusacionController@showForm')->name('new.acusacion')->middleware(['permission:new_acusacion']);
    Route::post('storeacusacion', 'AcusacionController@storeAcusacion')->name('store.acusacion')->middleware(['permission:store_acusacion']);
    Route::get('agregar-acusacion/{id}/eliminar', 'AcusacionController@delete')->name('delete.acusacion')->middleware(['permission:delete_acusacion']);
    
    /* --------Rutas para abogado----------- */
    Route::get('agregar-abogado', 'AbogadoController@showForm')->name('new.abogado')->middleware(['permission:new_abogado']);
    Route::post('storeabogado', 'AbogadoController@storeAbogado')->name('store.abogado')->middleware(['permission:store_abogado']);
    Route::get('agregar-abogado/{id}/eliminar', 'AbogadoController@delete')->name('delete.abogado')->middleware(['permission:delete_abogado']);
    
    
    /* --------Rutas para defensa----------- */
    Route::get('agregar-defensa', 'AbogadoController@showForm2')->name('new.defensa')->middleware(['permission:new_defensa']);
    Route::post('storedefensa', 'AbogadoController@storeDefensa')->name('store.defensa')->middleware(['permission:store_defensa']);
    // Route::get('agregar-defensa/{id}/eliminar', 'AbogadoController@delete');
    
    
    Route::get('involucrados/{idAbogado}', 'AbogadoController@getInvolucrados')->name('getinvolucrados')->middleware(['permission:getInvolucrados']);
    /* --------Rutas para Autoridad----------- */
    Route::get('agregar-autoridad', 'AutoridadController@showForm')->name('new.autoridad')->middleware(['permission:new_autoridad']);
    Route::post('storeautoridad', 'AutoridadController@storeAutoridad')->name('store.autoridad')->middleware(['permission:store_autoridad']);
    Route::get('agregar-autoridad/{id}/eliminar', 'AutoridadController@delete')->name('delete.autoridad')->middleware(['permission:delete_autoridad']);
    
    /* --------Rutas para Turnar----------- */
    Route::get('estadoCarpeta','EstadoController@index')->name('turnar.carpeta')->middleware(['permission:turnar_carpeta']);
    Route::post('estadoCarpeta','EstadoController@editar')->name('estado.edit')->middleware(['permission:estado_edit']);
    
    /* --------Rutas para Actas de hechos----------- */
    Route::get('actas','ActasHechosController@showform')->name('new.actahechos')->middleware(['permission:new_actahechos']);
    Route::post('addactas','ActasHechosController@addActas')->name('addactas')->middleware(['permission:addactas']);
    Route::post('addactas2','ActasHechosController@addActas2')->name('addactas2')->middleware(['permission:addactas2']);
    Route::get('actas-pendientes','ActasHechosController@actasPendientes')->name('actaspendientes')->middleware(['permission:actaspendientes']);
    Route::get('listaActas', 'ActasHechosController@showActas')->name('show.actas')->middleware(['permission:show_actas']);
    Route::get('atender-acta/{id}','ActasHechosController@actasPreregistro')->name('actaspreregistro')->middleware(['permission:actaspreregistro']);
    Route::post('/filtroactas', 'ActasHechosController@filtroActas')->name('post.filtro.actas')->middleware(['permission:filtroactas']);
    Route::get('/filtroactas', 'ActasHechosController@filtroActas')->name('get.filtro.actas')->middleware(['permission:filtroacta']);
    /* --------Rutas para imprimir oficiio acta de hechos moral y fisica----------- */
    Route::get('actaoficio/{id}', 'ActasHechosController@actaoficio')->name('actaoficio')->middleware(['permission:actaoficio']);
    Route::get('getoficioah/{id}', 'ActasHechosController@getoficioah')->name('get.oficioah')->middleware(['permission:get_oficioah']);
    Route::get('actaoficioM/{id}', 'ActasHechosController@actaOficioMoral')->name('actaoficioM')->middleware(['permission:actaoficioM']);
    Route::get('getoficioahm/{id}', 'ActasHechosController@getoficioahm')->name('get.oficioahm')->middleware(['permission:get_oficioahm']);
    
    Route::post('/folioActa', 'ActasHechosController@filtroActasPendientes')->name('filtroactapendiente')->middleware(['permission:filtroactapaciente']);
    
    /* --------Rutas para Actas circunstanciadas----------- */
    Route::get('actacircunstanciada','ActaCircunstanciadaController@showform')->name('new.actacircunstanciada')->middleware(['permission:new_actacircunstanciada']);
    Route::post('addactacircunstanciada','ActaCircunstanciadaController@addActaCirc')->name('addactaCirc')->middleware(['permission:addactaCirc']);
    Route::get('getcircunstanciada/{id}','ActaCircunstanciadaController@getcircunstanciada')->name('getcircunstanciada')->middleware(['permission:getcincunstanciada']);
    
    /* --------Rutas para Libro de gobierno----------- */
    Route::get('libro','LibroGobController@terminadas')->name('libro.gobierno.terminadas')->middleware(['permission:libro_gobierno_terminadas']);
    Route::get('carpetas','LibroGobController@buscar')->name('indexcarpetas')->middleware(['permission:indexcarpetas']);
    route::get('carpeta/{id}','ResumenCarpetaController@showForm')->name('ir.carpeta')->middleware(['permission:ir_carpetas']);
    Route::post('carpetas','LibroGobController@searchNumCarpeta')->name('filtro.carpetas')->middleware(['permission:filtro_carpetas']);
    Route::post('libroGobierno','LibroGobController@mostrarlibro')->name('libro.filtro')->middleware(['permission:libro_filtro']);
    /*-------------Carpetas en Reserva----------------------*/
    route::get('carpetaReserva/{id}','ResumenCarpetaController@showFormReserva')->name('carpeta.reserva')->middleware(['permission:carpeta_reserva']);
    Route::get('carpetasReserva','CarpetaController@indexCarpetasReserva')->name('carpetas.reserva')->middleware(['permission:carpetas_reserva']);
    Route::post('carpetasReserva','CarpetaController@filtroCarpetaReserva')->name('filtro.carpetasReserva')->middleware(['permission:filtro_carpetasReserva']);
    /* --------Rutas para Caratula de carpeta de investigacion----------- */
    Route::get('caratula/{id}','CaratulaCarpetaController@crearCaratula')->name('caratula')->middleware(['permission:caratula']);
    Route::get('caratula-impresion/{id}','CaratulaCarpetaController@imprimirCaratula')->name('imprimir.caratula')->middleware(['permission:imprimir_caratula']);
    
    
    /* --------Rutas para Periciales----------- */

    Route::get('solicitudes/periciales','PericialesController@getMensajesP')->name('get.mensajes.periciales')->middleware(['permission:get_mensajes_periciales']);
    Route::get('periciales','PericialesController@pericialesindex')->name('index.periciales')->middleware(['permission:index_periciales']);
    Route::post('periciales/agregar','PericialesController@agregar')->name('store.agregar')->middleware(['permission:store_agregar']);
    Route::post('periciales/psicologo','PericialesController@psico')->name('store.psicologo')->middleware(['permission:store_psicologo']);
    Route::post('periciales/vehiculo','PericialesController@vehi')->name('store.vehiculo')->middleware(['permission:store_vehiculo']);
    Route::post('periciales/lesiones','PericialesController@lesiones')->name('store.lesiones')->middleware(['permission:store_lesiones']);
    Route::get('getpericiales/{id}','PericialesController@getpericiales')->name('periciales.get')->middleware(['permission:periciales_get']);
    Route::get('getpsico/{id}','PericialesController@getpsico')->name('getpsico')->middleware(['permission:getpsico']);
    Route::get('getVh/{id}','PericialesController@getVh')->name('getVh.periciales')->middleware(['permission:getVh_periciales']);
    Route::get('getlesion/{id}','PericialesController@getlesion')->name('get.lesion')->middleware(['permission:get_lesion']);
    /* --------oficio finanzas------------------------*/
    Route::get('oficioFinanzas/{id}','PericialesController@getOficioF')->name('show.ofFinanzas')->middleware(['permission:show_ofFinanzas']);
    Route::get('OficioF-impresion/{id}','PericialesController@getVhFinanzas')->name('getVhFinanzas')->middleware(['permission:getVhFinanzas']);

    Route::get('getOficioM/{id}','PericialesController@getOficioM')->name('oficio.m')->middleware(['permission:oficio_m']);
    Route::get('getOficioP/{id}','PericialesController@getOficioP')->name('oficio.P')->middleware(['permission:oficio_P']);
    Route::get('getOficioV/{id}','PericialesController@getOficioV')->name('oficio.V')->middleware(['permission:oficio_V']);
    Route::get('getOficioL/{id}','PericialesController@getOficioL')->name('oficio.L')->middleware(['permission:oficio_L']);

    Route::get('imp/robo/{id}','PericialesController@impRobo')->name('oficio.impRobo')->middleware(['permission:oficio_impRobo']);
    Route::get('oficio/robo/{id}','PericialesController@reporteRobo')->name('oficio.reporteRobo')->middleware(['permission:oficio_reporteRobo']);
    
     /* --------Pruebas vehiculos----------- */
    Route::get('/agregar-vehiculos','VehiculoController@showform')->name('vehiculo.carpeta')->middleware(['permission:vehiculo_carpeta']);
    Route::get('submarcas/{id}', 'VehiculoController@getSubmarcas')->name('get.submarcas')->middleware(['permission:get_submarcas']);
    Route::get('tipoVehiculos/{id}', 'VehiculoController@getTipoVehiculos')->name('get.tipovehiculos')->middleware(['permission:get_tipovehiculos']);
    Route::post('store-vehiculo', 'VehiculoController@storeVehiculo')->name('carpeta.vehiculo')->middleware(['permission:carpeta_vehiculo']);
    Route::get('getVehiculo/{id}', 'VehiculoController@getVh')->name('getVh')->middleware(['permission:getVh']);
    Route::get('vehiculo/{id}/eliminar', 'VehiculoController@delete')->name('delete.vehiculo')->middleware(['permission:delete_vehiculo']);

    Route::get('getVehiculoAjax/{id}', 'VehiculoController@getVehiculoAjax')->name("getVehiculoAjax")->middleware(['permission:getVehiculoAjax']);
    Route::post('vehiculo/editar', 'VehiculoController@editar')->name('agregar-vehiculo')->middleware(['permission:agregar_vehiculo']);

    /* -----------Ruta para Libro de Oficios------------ */
    Route::get('lista-oficios','LibroOficioController@IndexOfi')->name('lista.ficios')->middleware(['permission:lista_oficios']);
    Route::post('/filtro', 'LibroOficioController@filtroActas')->name('filtro.actas.post')->middleware(['permission:filtro_actas_post']);
    Route::get('/filtro', 'LibroOficioController@filtroActas')->name('filtro.actas.get')->middleware(['permission:filtro_actas_get']);
    
    /* -----------Ruta para cambio de rol------------ */
    Route::post('rol','RegisterController@cambioRol')->name('cambioRol');

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
Route::get('listas/{id}', 'RegisterController@getListas')->name('get.listas');
Route::get('fiscales/{id}', 'RegisterController@getFiscales')->name('get.fiscales');
/********************generar pdf**********************************/
Route::get('FormatoRegistro/{id}', 'PdfController@datos');
