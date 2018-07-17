<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class PDFcontroller extends Controller
{
    
	public function datos ($id){
		$DatosRegistros = DB::table('preregistros')
		->leftJoin('razones','preregistros.idRazon','=','razones.id')
		->leftJoin('domicilio','preregistros.idDireccion','=','domicilio.id')
		->leftJoin('cat_municipio','domicilio.idMunicipio','=','cat_municipio.id')
		->leftJoin('cat_ocupacion','preregistros.idOcupacion','=','cat_ocupacion.id')
		->leftJoin('cat_identificacion','preregistros.docIdentificacion','=','cat_identificacion.id')
		->select('preregistros.id as id', 'preregistros.esEmpresa as esEmpresa', 'cat_ocupacion.nombre as ocupacion', 'razones.nombre as razon',
		'cat_municipio.nombre as municipio',  'preregistros.nombre as nombre', 'primerAp', 'segundoAp', 'rfc',
		 'cat_identificacion.documento as docIdentificacion',  'folio', 'representanteLegal', 'preregistros.created_at')
		->where ('preregistros.id', '=', $id)
		->first();
		
		$data = ['DatosRegistros' => $DatosRegistros];
		
		$pdf = PDF::loadView('servicios.pdf.pdf-preregistro', $data)->setPaper('letter', 'landscape');//->save('E:\NUEVO.pdf');
		
		//return $pdf->stream('pruebapdf.pdf');
		return $pdf->stream($DatosRegistros->folio.'.pdf');		
		//return $pdf->download('PreregistroUAT.pdf');
	}

}
