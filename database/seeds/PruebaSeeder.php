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
        /************usuario para pruebas fuera de la fiscalia*************/
        DB::table('users')->insert([
            ['idUnidad'   =>  25, 'idZona'=>8,  'username' =>  'admin','nombreC' =>  'Usuario Prueba Local', 'nombres' =>  'Usuario', 'apellidos' =>  'Prueba Local','grupo'=>'Facilitador','email'=>'admin@fiscaliaveracruz.gob.mx','password'=> bcrypt('admin'),'puesto'=>'Fiscal cuarto de la unidad de xalapa', 'numFiscal'=>4, 'numFiscalLetras'=>'Fiscal cuarto' ],
        ]);
        /******************************************************************/
        DB::table('domicilio')->insert([
            ['idMunicipio'  =>  2091,  'idLocalidad'   =>  82005,  'idColonia' =>  40657,  'calle' =>  'CALLE DE ALGUN LUGAR', 'numExterno'    =>  '5',  'numInterno'    =>  'S/N'],
            ['idMunicipio'  =>  2097,  'idLocalidad'   =>  82425,  'idColonia' =>  43489,  'calle' =>  'RUIZ CORTINEZ', 'numExterno'    =>  '152',  'numInterno'    =>  'B'],
            ['idMunicipio'  =>  2113,  'idLocalidad'   =>  83851,  'idColonia' =>  40481,  'calle' =>  'LA CALLE DE LA ESQUINA', 'numExterno'    =>  '20',  'numInterno'    =>  'C']
        	
        ]);

        DB::table('preregistros')->insert([
            ['idDireccion'  =>  1,  'esEmpresa'   =>  0, 'idRazon'=>2, 'fechaNac'=>'1995-02-11','statusCancelacion'=>0, 'edad'=>23, 'nombre' =>  'JUAN',  'primerAp' =>  'PEREZ', 'segundoAp'    =>  'PEREZ',  'rfc'    =>  'PEPJ950211VH3', 'curp' => 'PEPJ950211VH3VZNL0','sexo'=>'HOMBRE','telefono'=>'2284658970','docIdentificacion'=> 1,'numDocIdentificacion'=>'HVOZSDFA151ASC51EF65','narracion'=>'LE ACABAN DE ASALTAR Y SE LLEVANRON MI CELULAR','folio'=>'A65S4F','idEscolaridad'=>5,'idEstadoCivil'=>5,'idOcupacion'=>4 ],
            ['idDireccion'  =>  3,  'esEmpresa'   =>  0, 'idRazon'=>2, 'fechaNac'=>'1995-02-11','statusCancelacion'=>0, 'edad'=>23, 'nombre' =>  'ALEJANDRO',  'primerAp' =>  'MARTINEZ', 'segundoAp'    =>  'ACOSTA',  'rfc'    =>  'MAAA950211VH3', 'curp' => 'MAAA950211VH3VH3NL','sexo'=>'HOMBRE','telefono'=>'6841534316','docIdentificacion'=> 5,'numDocIdentificacion'=>'A416514A35FASDAS','narracion'=>'ME GOLPERARON CUANDO ME BAJE DEL CALLO POR LA LAZARO.','folio'=>'F63NGS' ,'idEscolaridad'=>5,'idEstadoCivil'=>5,'idOcupacion'=>4],
            ['idDireccion'  =>  3,  'esEmpresa'   =>  0, 'idRazon'=>2, 'fechaNac'=>'1995-02-11','statusCancelacion'=>0, 'edad'=>23, 'nombre' =>  'MARTA',  'primerAp' =>  'RAMIREZ', 'segundoAp'    =>  'CRUZ',  'rfc'    =>  'RACM950211S48' ,'curp' => 'RACM950211VH3VH3VZ','sexo'=>'HOMBRE','telefono'=>'6841534316','docIdentificacion'=> 3,'numDocIdentificacion'=>'6RG4WEF6W8E4F6QWFQ6W4D','narracion'=>'asufhaksdifahsdgijakshd iDHSFisdhfi hKFH Khfkihfk hkfuahsdkfhakshkaehfh awehfñwaehfk','folio'=>'MVG64M','idEscolaridad'=>5,'idEstadoCivil'=>5,'idOcupacion'=>4 ]
        ]);
        
        DB::table('preregistros')->insert([
            ['idDireccion'  =>  1,  'esEmpresa'   =>  0, 'idRazon'=>4, 'fechaNac'=>'1995-02-11','statusCancelacion'=>0, 'edad'=>23, 'nombre' =>  'PEDRO',  'primerAp' =>  'HERNANDEZ', 'segundoAp'    =>  'PEREZ',  'rfc'    =>  'PEPJ950211VH3', 'curp' => 'PEPJ950211VH3VZNL','sexo'=>'HOMBRE','telefono'=>'2284658970','docIdentificacion'=> 10,'numDocIdentificacion'=>'HVOZSDFA151ASC51EF65','narracion'=>'LE ACABAN DE ASALTAR Y SE LLEVANRON MI CELULAR','folio'=>'ULI655','tipoActa'=>'TELEFONO CELULAR' ,'idEscolaridad'=>5,'idEstadoCivil'=>5,'idOcupacion'=>4],
            ['idDireccion'  =>  2,  'esEmpresa'   =>  0, 'idRazon'=>4, 'fechaNac'=>'1995-02-11','statusCancelacion'=>0, 'edad'=>23, 'nombre' =>  'PATRICIO',  'primerAp' =>  'RAMIREZ', 'segundoAp'    =>  'ACOSTA',  'rfc'    =>  'MAAA950211VH3', 'curp' => 'MAAA950211VH3VH3NL','sexo'=>'HOMBRE','telefono'=>'6841534316','docIdentificacion'=> 13,'numDocIdentificacion'=>'A416514A35FASDAS','narracion'=>'ME GOLPERARON CUANDO ME BAJE DEL CALLO POR LA LAZARO.','folio'=>'6C5VN4','tipoActa'=>'PLACAS DE CIRCULACION','idEscolaridad'=>5,'idEstadoCivil'=>5,'idOcupacion'=>4 ],
            ['idDireccion'  =>  3,  'esEmpresa'   =>  0, 'idRazon'=>4, 'fechaNac'=>'1995-02-11','statusCancelacion'=>0, 'edad'=>23, 'nombre' =>  'JULIAN',  'primerAp' =>  'FERNANDEZ', 'segundoAp'    =>  'CRUZ',  'rfc'    =>  'RACM950211S48' ,'curp' => 'RACM950211VH3VH3VZ','sexo'=>'HOMBRE','telefono'=>'6841534316','docIdentificacion'=> 5,'numDocIdentificacion'=>'6SEF46WSE4FWE4F6WE4F','narracion'=>'asufhaksdifahsdgijakshd iDHSFisdhfi hKFH Khfkihfk hkfuahsdkfhakshkaehfh awehfñwaehfk','folio'=>'6R8Y4G' ,'tipoActa'=>'FACTURA DE VEHICULO/MOTOCICLETA','idEscolaridad'=>5,'idEstadoCivil'=>5,'idOcupacion'=>4 ]
        ]);

        DB::table('preregistros')->insert([
            ['idDireccion'  =>  2,  'esEmpresa'   =>  1, 'idRazon'=>2,  'fechaNac'=>'1995-02-11',  'nombre' =>  'TALLER DE LOS HERMANOS SA DE CV',  'rfc' =>  'ASDF963258741','telefono'=>'22565534316','representanteLegal'=> 'LIC. JAUN PEREZ PEREZ','statusCancelacion'=>0,'narracion'=>'ROBO MI ESTABLECIMIENTO','folio'=>'63SXJ5' ],
            ['idDireccion'  =>  2,  'esEmpresa'   =>  1, 'idRazon'=>2,  'fechaNac'=>'1995-02-11',  'nombre' =>  'AUTOLAVADOS PEREZ SA DE CV',    'rfc' =>  'QWER764312589','telefono'=>'2241534316','representanteLegal'=> 'MARTA MORALES ACOSTA','statusCancelacion'=>0,'narracion'=>'ARMO UN ALBOROTO EN MI ESTABLECIMIENTO','folio'=>'3A2S1G' ],
            ['idDireccion'  =>  1,  'esEmpresa'   =>  1, 'idRazon'=>2,  'fechaNac'=>'1995-02-11',  'nombre' =>  'UNIVERSIDAD DE XALAPA',  'rfc' =>  'FSHD123679548','telefono'=>'22965534316','representanteLegal'=> 'FRANCISCO LOPEZ PEREZ','statusCancelacion'=>0,'narracion'=>'ASALTO MI ESTABLECIMIENTO','folio'=>'FJ3G54' ]
        ]);
    }
}
