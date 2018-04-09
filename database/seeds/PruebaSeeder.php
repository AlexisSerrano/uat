<?php

use Illuminate\Database\Seeder;

class PruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('domicilio')->insert([
            ['idMunicipio'  =>  2091,  'idLocalidad'   =>  82005,  'idColonia' =>  40657,  'calle' =>  'CALLE DE ALGUN LUGAR', 'numExterno'    =>  '5',  'numInterno'    =>  'S/N'],
            ['idMunicipio'  =>  2097,  'idLocalidad'   =>  82425,  'idColonia' =>  43489,  'calle' =>  'RUIZ CORTINEZ', 'numExterno'    =>  '152',  'numInterno'    =>  'B'],
            ['idMunicipio'  =>  2113,  'idLocalidad'   =>  83851,  'idColonia' =>  40481,  'calle' =>  'LA CALLE DE LA ESQUINA', 'numExterno'    =>  '20',  'numInterno'    =>  'C']
        	
        ]);

        DB::table('preregistros')->insert([
            ['idDireccion'  =>  1,  'esEmpresa'   =>  0, 'idRazon'=>2, 'fechaNac'=>'1995-02-11','statusCancelacion'=>0, 'edad'=>23, 'nombre' =>  'JUAN',  'primerAp' =>  'PEREZ', 'segundoAp'    =>  'PEREZ',  'rfc'    =>  'PEPJ950211VH3', 'curp' => 'PEPJ950211VH3VZNL05','sexo'=>'HOMBRE','telefono'=>'2284658970','docIdentificacion'=> 'INE','numDocIdentificacion'=>'HVOZSDFA151ASC51EF65','narracion'=>'LE ACABAN DE ASALTAR Y SE LLEVANRON MI CELULAR','folio'=>'123654789321456987' ],
            ['idDireccion'  =>  3,  'esEmpresa'   =>  0, 'idRazon'=>2, 'fechaNac'=>'1995-02-11','statusCancelacion'=>0, 'edad'=>23, 'nombre' =>  'ALEJANDRO',  'primerAp' =>  'MARTINEZ', 'segundoAp'    =>  'ACOSTA',  'rfc'    =>  'MAAA950211VH3', 'curp' => 'MAAA950211VH3VH3NL05','sexo'=>'HOMBRE','telefono'=>'6841534316','docIdentificacion'=> 'IFE','numDocIdentificacion'=>'A416514A35FASDAS','narracion'=>'ME GOLPERARON CUANDO ME BAJE DEL CALLO POR LA LAZARO.','folio'=>'ASFAS4835492AFE' ],
            ['idDireccion'  =>  3,  'esEmpresa'   =>  0, 'idRazon'=>2, 'fechaNac'=>'1995-02-11','statusCancelacion'=>0, 'edad'=>23, 'nombre' =>  'MARTA',  'primerAp' =>  'RAMIREZ', 'segundoAp'    =>  'CRUZ',  'rfc'    =>  'RACM950211S48' ,'curp' => 'RACM950211VH3VH3VZ05','sexo'=>'HOMBRE','telefono'=>'6841534316','docIdentificacion'=> 'PASAPORTE','numDocIdentificacion'=>'oajsfñoajdfaksdfgaj','narracion'=>'asufhaksdifahsdgijakshd iDHSFisdhfi hKFH Khfkihfk hkfuahsdkfhakshkaehfh awehfñwaehfk','folio'=>'ASFAS48354AF91E' ]
        ]);

        DB::table('preregistros')->insert([
            ['idDireccion'  =>  2,  'esEmpresa'   =>  1, 'idRazon'=>2,  'nombre' =>  'TALLER DE LOS HERMANOS SA DE CV',  'rfc' =>  'ASDF963258741','telefono'=>'22565534316','representanteLegal'=> 'LIC. JAUN PEREZ PEREZ','statusCancelacion'=>0,'narracion'=>'ROBO MI ESTABLECIMIENTO','folio'=>'UANFAFSM87166581' ],
            ['idDireccion'  =>  2,  'esEmpresa'   =>  1, 'idRazon'=>2,  'nombre' =>  'AUTOLAVADOS PEREZ SA DE CV',    'rfc' =>  'QWER764312589','telefono'=>'2241534316','representanteLegal'=> 'MARTA MORALES ACOSTA','statusCancelacion'=>0,'narracion'=>'ARMO UN ALBOROTO EN MI ESTABLECIMIENTO','folio'=>'11861616854153' ],
            ['idDireccion'  =>  1,  'esEmpresa'   =>  1, 'idRazon'=>2,  'nombre' =>  'UNIVERSIDAD DE XALAPA',  'rfc' =>  'FSHD123679548','telefono'=>'22965534316','representanteLegal'=> 'FRANCISCO LOPEZ PEREZ','statusCancelacion'=>0,'narracion'=>'ASALTO MI ESTABLECIMIENTO','folio'=>'56165163135135' ]
        ]);
    }
}
