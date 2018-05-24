<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;
class Preregistro extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $id=session('idpreregistro');
        $DatosRegistros = DB::table('preregistros')
		->select('id', 'idDireccion', 'esEmpresa', 'nombre', 'primerAp', 'segundoAp', 'rfc', 'fechaNac', 'sexo', 'curp', 'telefono', 'docIdentificacion', 'numDocIdentificacion', 'conViolencia', 'narracion', 'folio', 'representanteLegal', 'statusCancelacion', 'statusOrigen', 'created_at')
		->where ('preregistros.id', '=', $id)
		->get();

         return $this->view('servicios.pdf.pdf-preregistro')->with('DatosRegistros',$DatosRegistros);

        // return $this->loadFile('E:\NUEVO.pdf');
        //  $pdf = PDF::loadView('servicios.pdf.pdf-preregistro', $data)->save('E:\NUEVO.pdf');
        //  $pdf = PDF::loadView('servicios.pdf.pdf-preregistro', $data)->save('E:\NUEVO.pdf');;
		// return $pdf->stream($DatosRegistros[0]->folio.'.pdf');
        // // return redirect('FormatoRegistro/');
    
    }
}
