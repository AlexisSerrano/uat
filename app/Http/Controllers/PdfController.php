<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class PDFcontroller extends Controller
{
    
	public function datos ($id){
		$DatosRegistros = DB::table('preregistros')
		->select('id', 'idDireccion', 'esEmpresa', 'nombre', 'primerAp', 'segundoAp', 'rfc', 'fechaNac', 'sexo', 'curp', 'telefono', 'docIdentificacion', 'numDocIdentificacion', 'conViolencia', 'narracion', 'folio', 'representanteLegal', 'statusCancelacion', 'statusOrigen', 'created_at')
		->where ('preregistros.id', '=', $id)
		->get();

		
		//dd($DatosRegistros);
		$data = ['DatosRegistros' => $DatosRegistros];
		$pdf = PDF::loadView('servicios.pdf.pdf-preregistro', $data)->save('E:\NUEVO.pdf');
		
		//return $pdf->stream('pruebapdf.pdf');
		return $pdf->stream($DatosRegistros[0]->folio.'.pdf');
		
		
		
		//return $pdf->download('gol.pdf');
		




	}

}
