<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');
        //Creación de permisos
        Permission::create(['name' => 'tabla_oficios']);
        Permission::create(['name' => 'fiscal_distrito']);
        Permission::create(['name' => 'oficio_funcion']);
        Permission::create(['name' => 'get_fiscal']);
        Permission::create(['name' => 'store_oficioDistrito']);
        Permission::create(['name' => 'dato_fiscal_impresiones']);
        Permission::create(['name' => 'policia_ministerial']);
        Permission::create(['name' => 'datos_ministerial']);
        Permission::create(['name' => 'oficio_transporte']);
        Permission::create(['name' => 'storeoficio_transporte']);
        Permission::create(['name' => 'oficio_cavd']);
        Permission::create(['name' => 'show_oficioCavd']);
        Permission::create(['name' => 'store_oficioCavd']);
        Permission::create(['name' => 'datos_oficioCavd']);
        Permission::create(['name' => 'not_actuaciones']);
        Permission::create(['name' => 'impresion_actuaciones']);
        Permission::create(['name' => 'impresion_archivoTemporal']);
        Permission::create(['name' => 'impresion_temporal']);
        Permission::create(['name' => 'primera_invitacion']);
        Permission::create(['name' => 'show_invitacion']);
        Permission::create(['name' => 'datos_invitacion']);
        Permission::create(['name' => 'oficio_inicio']);
        Permission::create(['name' => 'impresion_acuerdoInicio']);
        Permission::create(['name' => 'oficio_remision']);
        Permission::create(['name' => 'impresion_remision']);
        Permission::create(['name' => 'formato_denuncia']);
        Permission::create(['name' => 'get_formatoDenuncia']);
        Permission::create(['name' => 'oficios']);
        Permission::create(['name' => 'getToken']);
        Permission::create(['name' => 'saveOficio']);
        Permission::create(['name' => 'intentos']);
        Permission::create(['name' => 'getOficios']);
        Permission::create(['name' => 'getOficio']);
        Permission::create(['name' => 'addOficio']);
        Permission::create(['name' => 'updateOficio']);
        Permission::create(['name' => 'acuerdo_inicio']);
        Permission::create(['name' => 'acuerdo_documento']);
        Permission::create(['name' => 'disponibilidad_fiscal']);
        Permission::create(['name' => 'carpeta_detalle']);
        Permission::create(['name' => 'resumen_denunciante']);
        Permission::create(['name' => 'resumen_denunciado']);
        Permission::create(['name' => 'resumen_acusaciones']);
        Permission::create(['name' => 'resumen_delito']);
        Permission::create(['name' => 'resumen_abogado']);
        Permission::create(['name' => 'resumen_autoridad']);
        Permission::create(['name' => 'resumen_defensa']);
        Permission::create(['name' => 'resumen_vehiculo']);
        Permission::create(['name' => 'historial_carpeta']);
        Permission::create(['name' => 'inicio_caso']);
        Permission::create(['name' => 'cancelar_caso']);
        Permission::create(['name' => 'terminar_Caso']);
        Permission::create(['name' => 'salir_caso']);
        Permission::create(['name' => 'new_denunciante']);
        Permission::create(['name' => 'store_denunciante']);
        Permission::create(['name' => 'delete_denunciante']);
        Permission::create(['name' => 'atender']);
        Permission::create(['name' => 'tomar_turno']);
        Permission::create(['name' => 'turno_denunciante']);
        Permission::create(['name' => 'devolver']);
        Permission::create(['name' => 'post_showByfolio']);
        Permission::create(['name' => 'get_showByfolio']);
        Permission::create(['name' => 'en_cola']);
        Permission::create(['name' => 'urgentes']);
        Permission::create(['name' => 'prioridadpreregistrofiltro']);
        Permission::create(['name' => 'showbymunicipio']);
        Permission::create(['name' => 'datos_estado']);
        Permission::create(['name' => 'estado']);
        Permission::create(['name' => 'predenuncias_index']);
        Permission::create(['name' => 'predenuncias_edit']);
        Permission::create(['name' => 'predenuncias_update']);
        Permission::create(['name' => 'ver_pre_aux']);
        Permission::create(['name' => 'create_pre_aux']);
        Permission::create(['name' => 'observaciones']);
        Permission::create(['name' => 'store_descripcionHechos']);
        Permission::create(['name' => 'narracion']);
        Permission::create(['name' => 'new_narracion']);
        Permission::create(['name' => 'getnarracion']);
        Permission::create(['name' => 'mostrar_doc']);
        Permission::create(['name' => 'new_denunciado']);
        Permission::create(['name' => 'store_denunciado']);
        Permission::create(['name' => 'delete_denunciado']);
        Permission::create(['name' => 'notificaciones']);
        Permission::create(['name' => 'registros_orientador']);
        Permission::create(['name' => 'lista_filtro_orientador']);
        Permission::create(['name' => 'edit_registros_orientador']);
        Permission::create(['name' => 'buscar_folio_orientador_post']);
        Permission::create(['name' => 'buscar_folio_orientador_get']);
        Permission::create(['name' => 'buscarmunicipio']);
        Permission::create(['name' => 'put_registro']);
        Permission::create(['name' => 'index_preregistro']);
        Permission::create(['name' => 'fiscal']);
        Permission::create(['name' => 'index_atencion_rapida']);
        Permission::create(['name' => 'addatencion']);
        Permission::create(['name' => 'medidas']);
        Permission::create(['name' => 'addMedidas']);
        Permission::create(['name' => 'getMedidas']);
        Permission::create(['name' => 'delete_medida']);
        Permission::create(['name' => 'agregar_medidas']);
        Permission::create(['name' => 'getMedidasAjax']);
        Permission::create(['name' => 'medida_oficio_datos']);
        Permission::create(['name' => 'medidaoficio']);
        Permission::create(['name' => 'new_delito']);
        Permission::create(['name' => 'store_delito']);
        Permission::create(['name' => 'delete_delito']);  
        Permission::create(['name' => 'get_agregacion1']);
        Permission::create(['name' => 'get_agregacion2']);
        Permission::create(['name' => 'getDelitoAjax']);
        Permission::create(['name' => 'editar_delito']);
        Permission::create(['name' => 'new_acusacion']);
        Permission::create(['name' => 'store_acusacion']);  
        Permission::create(['name' => 'delete_acusacion']);
        Permission::create(['name' => 'new_abogado']);
        Permission::create(['name' => 'store_abogado']);
        Permission::create(['name' => 'delete_abogado']);
        Permission::create(['name' => 'new_defensa']);
        Permission::create(['name' => 'store_defensa']);  
        Permission::create(['name' => 'getInvolucrados']);
        Permission::create(['name' => 'new_autoridad']);
        Permission::create(['name' => 'store_autoridad']);
        Permission::create(['name' => 'delete_autoridad']);
        Permission::create(['name' => 'turnar_carpeta']);
        Permission::create(['name' => 'estado_edit']);
        Permission::create(['name' => 'new_actahechos']);
        Permission::create(['name' => 'addactas']);
        Permission::create(['name' => 'addactas2']);
        Permission::create(['name' => 'actaspendientes']);  
        Permission::create(['name' => 'show_actas']);
        Permission::create(['name' => 'actaspreregistro']);
        Permission::create(['name' => 'filtroactas']);
        Permission::create(['name' => 'filtroacta']);
        Permission::create(['name' => 'actaoficio']);
        Permission::create(['name' => 'get_oficioah']);
        Permission::create(['name' => 'actaoficioM']);
        Permission::create(['name' => 'get_oficioahm']);
        Permission::create(['name' => 'filtroactapaciente']);  
        Permission::create(['name' => 'new_actacircunstanciada']);
        Permission::create(['name' => 'addactaCirc']);
        Permission::create(['name' => 'getcincunstanciada']);
        Permission::create(['name' => 'libro_gobierno_terminadas']);
        Permission::create(['name' => 'indexcarpetas']);
        Permission::create(['name' => 'ir_carpetas']);
        Permission::create(['name' => 'filtro_carpetas']);
        Permission::create(['name' => 'libro_filtro']);
        Permission::create(['name' => 'carpeta_reserva']);  
        Permission::create(['name' => 'carpetas_reserva']);
        Permission::create(['name' => 'filtro_carpetasReserva']);
        Permission::create(['name' => 'caratula']);
        Permission::create(['name' => 'imprimir_caratula']);
        Permission::create(['name' => 'get_mensajes_periciales']);
        Permission::create(['name' => 'index_periciales']);
        Permission::create(['name' => 'store_agregar']);
        Permission::create(['name' => 'store_psicologo']);
        Permission::create(['name' => 'store_vehiculo']);
        Permission::create(['name' => 'store_lesiones']);  
        Permission::create(['name' => 'periciales_get']);
        Permission::create(['name' => 'getpsico']);
        Permission::create(['name' => 'getVh_periciales']);
        Permission::create(['name' => 'get_lesion']);
        Permission::create(['name' => 'show_ofFinanzas']);
        Permission::create(['name' => 'getVhFinanzas']);
        Permission::create(['name' => 'oficio_m']);
        Permission::create(['name' => 'oficio_P']);
        Permission::create(['name' => 'oficio_V']);
        Permission::create(['name' => 'oficio_L']);  
        Permission::create(['name' => 'oficio_impRobo']);
        Permission::create(['name' => 'oficio_reporteRobo']);
        Permission::create(['name' => 'vehiculo_carpeta']);
        Permission::create(['name' => 'get_submarcas']);
        Permission::create(['name' => 'get_tipovehiculos']);
        Permission::create(['name' => 'carpeta_vehiculo']);
        Permission::create(['name' => 'getVh']);
        Permission::create(['name' => 'delete_vehiculo']);
        Permission::create(['name' => 'getVehiculoAjax']);
        Permission::create(['name' => 'agregar_vehiculo']);  
        Permission::create(['name' => 'lista_oficios']);
        Permission::create(['name' => 'filtro_actas_post']);
        Permission::create(['name' => 'filtro_actas_get']);
        Permission::create(['name' => 'getOficiosApp']);
        Permission::create(['name' => 'recuperar_token']);
        Permission::create(['name' => 'recuperar']);
        
       
        //Creación de roles
        $coordinador = Role::create(['name' => 'coordinador']);
        $facilidador = Role::create(['name' => 'facilitador']);
        $orientador  = Role::create(['name' => 'orientador']);
        $recepcion   = Role::create(['name' => 'recepcion']);

        
        // Asignación de permisos a Rol de Fiscal Coordinador
        $coordinador->givePermissionTo(['disponibilidad_fiscal','carpeta_detalle','resumen_denunciante',
        'resumen_denunciado','resumen_acusaciones','resumen_delito','resumen_abogado','resumen_autoridad',
        'resumen_defensa','resumen_vehiculo','historial_carpeta','salir_caso','libro_gobierno_terminadas',
        'oficios', 'indexcarpetas','ir_carpetas','filtro_carpetas','libro_filtro','lista_oficios',
        'filtro_actas_post','actaoficio','get_oficioah','actaoficioM','get_oficioahm','filtro_actas_get']);
 
       
        // Asignación de permisos a Rol de Fiscal Facilitador
        $facilidador->givePermissionTo();


        // Asignación de permisos a Rol de Fiscal Orientador
        $orientador->givePermissionTo(['indexcarpetas','tabla_oficios','fiscal_distrito','oficio_funcion',
        'get_fiscal','store_oficioDistrito','dato_fiscal_impresiones','policia_ministerial','datos_ministerial',
        'oficio_transporte' ,'storeoficio_transporte' ,'oficio_cavd','show_oficioCavd','store_oficioCavd','datos_oficioCavd',
        'not_actuaciones','impresion_actuaciones' ,'impresion_archivoTemporal','impresion_temporal',
        'primera_invitacion','show_invitacion' ,'datos_invitacion','oficio_inicio' ,'impresion_acuerdoInicio',
        'oficio_remision','impresion_remision','formato_denuncia','get_formatoDenuncia','getToken',
        'saveOficio','acuerdo_inicio','acuerdo_documento','carpeta_detalle','resumen_denunciante',
        'resumen_denunciado','resumen_acusaciones','resumen_delito','resumen_abogado','resumen_autoridad',
        'resumen_defensa','resumen_vehiculo','historial_carpeta','inicio_caso',
        'cancelar_caso','terminar_Caso','salir_caso','new_denunciante','store_denunciante','delete_denunciante',
        'atender','tomar_turno','turno_denunciante','devolver','observaciones','store_descripcionHechos',
        'narracion','new_narracion','getnarracion','mostrar_doc','new_denunciado','store_denunciado',
        'delete_denunciado', 'notificaciones', 'registros_orientador','lista_filtro_orientador',
        'edit_registros_orientador', 'buscar_folio_orientador_post','buscar_folio_orientador_get','buscarmunicipio',
        'put_registro','index_atencion_rapida', 'addatencion','medidas','addMedidas','getMedidas','delete_medida',
        'agregar_medidas','getMedidasAjax','medida_oficio_datos','medidaoficio','new_delito','store_delito',
        'delete_delito', 'get_agregacion1','get_agregacion2','getDelitoAjax','editar_delito','new_acusacion',
        'store_acusacion','delete_acusacion','new_abogado','store_abogado','delete_abogado','new_defensa',
        'store_defensa','getInvolucrados','new_autoridad','store_autoridad','delete_autoridad','turnar_carpeta',
        'estado_edit','new_actahechos','addactas','addactas2','actaspendientes','show_actas','actaspreregistro',
        'filtroactas','filtroacta','actaoficio','get_oficioah','actaoficioM','get_oficioahm',
        'filtroactapaciente','new_actacircunstanciada','addactaCirc','getcincunstanciada','ir_carpetas',
        'carpeta_reserva', 'carpetas_reserva','filtro_carpetas','filtro_carpetasReserva', 'caratula','imprimir_caratula','get_mensajes_periciales',
        'index_periciales','store_agregar','store_psicologo','store_vehiculo','store_lesiones', 'periciales_get',
        'getpsico','getVh_periciales','get_lesion','show_ofFinanzas','getVhFinanzas','oficio_m','oficio_P','oficio_V',
        'oficio_L','oficio_impRobo','oficio_reporteRobo','vehiculo_carpeta','get_submarcas','get_tipovehiculos',
        'carpeta_vehiculo','getVh','delete_vehiculo','getVehiculoAjax','agregar_vehiculo','oficios','intentos',
        'getOficios','getOficio','addOficio','updateOficio','recuperar','recuperar_token','getOficiosApp']);  

        // Asignación de permisos a Rol de Recepción
        $recepcion->givePermissionTo(['post_showByfolio' ,'get_showByfolio','en_cola','urgentes',
        'prioridadpreregistrofiltro','showbymunicipio','datos_estado',
        'estado','predenuncias_index', 'predenuncias_edit','predenuncias_update','ver_pre_aux',
        'create_pre_aux','index_preregistro', 'fiscal','index_atencion_rapida','addatencion']);


    }
}
