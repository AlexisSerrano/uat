<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


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
            ['idMunicipio'  =>  2493,  'idLocalidad'   =>  106783,  'idColonia' =>  49115,  'calle' =>  'SIN INFORMACION', 'numExterno'    =>  'S/N',  'numInterno'    =>  'S/N']            
        ]);
        /************usuario para pruebas fuera de la fiscalia*************/
        $user=App\User::create([
            'idUnidad'   =>  25, 
            'idZona'=>8,  
            'username' =>  'admin',
            'nombreC' =>  'Usuario Prueba Local', 
            'nombres' =>  'Usuario', 
            'apellidos' =>  'Prueba Local',
            'grupo'=>'orientador',
            'grecepcion'=>1,
            'gorientador'=>1,
            'gfacilitador'=>1,
            'gcoordinador'=>1,
            'email'=>'admin@fiscaliaveracruz.gob.mx',
            'password'=> bcrypt('admin'),
            'session_id' => 'sesionid0f1',
            'puesto'=>'Fiscal cuarto de la unidad de xalapa', 
            'numFiscal'=>4, 
            'numFiscalLetras'=>'Cuarto'
        ]);
        $user->assignRole('orientador');
        /******************************************************************/
        DB::table('domicilio')->insert([            
            ['idMunicipio'  =>  2097,  'idLocalidad'   =>  82389,  'idColonia' =>  43449,  'calle' =>  'RUIZ CORTINEZ', 'numExterno'    =>  '152',  'numInterno'    =>  'B'],
            ['idMunicipio'  =>  2205,  'idLocalidad'   =>  93140,  'idColonia' =>  44169,  'calle' =>  'LA CALLE DE LA ESQUINA', 'numExterno'    =>  '20',  'numInterno'    =>  'C'],
            ['idMunicipio'  =>  2091,  'idLocalidad'   =>  81877,  'idColonia' =>  40665,  'calle' =>  'CALLE DE ALGUN LUGAR', 'numExterno'    =>  '5',  'numInterno'    =>  'S/N'],
            ['idMunicipio'  =>  2097,  'idLocalidad'   =>  82389,  'idColonia' =>  43449,  'calle' =>  'CALLE FICTICIA', 'numExterno'    =>  '10',  'numInterno'    =>  'P'],
        	
        ]);

        DB::table('preregistros')->insert([            
            ['idDireccion'  =>  2,  'esEmpresa'   =>  0, 'idRazon'=>2, 'fechaNac'=>'1995-02-11','statusCancelacion'=>0, 'edad'=>23, 'nombre' =>  'JUAN',  'primerAp' =>  'PEREZ', 'segundoAp'    =>  'PEREZ',  'rfc'    =>  'PEPJ950211VH3', 'curp' => 'PEPJ950211VH3VZNL0','sexo'=>'HOMBRE','telefono'=>'2284658970','docIdentificacion'=> 1,'numDocIdentificacion'=>'HVOZSDFA151ASC51EF65','narracion'=>'LE ACABAN DE ASALTAR Y SE LLEVANRON MI CELULAR','folio'=>'A65S4F','idEscolaridad'=>5,'idEstadoCivil'=>5,'idOcupacion'=>4,'idMunicipioOrigen'=>2254, 'created_at'=>Carbon::now() ],
            ['idDireccion'  =>  3,  'esEmpresa'   =>  0, 'idRazon'=>2, 'fechaNac'=>'1995-02-11','statusCancelacion'=>0, 'edad'=>23, 'nombre' =>  'ALEJANDRO',  'primerAp' =>  'MARTINEZ', 'segundoAp'    =>  'ACOSTA',  'rfc'    =>  'MAAA950211VH3', 'curp' => 'MAAA950211VH3VH3NL','sexo'=>'HOMBRE','telefono'=>'6841534316','docIdentificacion'=> 5,'numDocIdentificacion'=>'A416514A35FASDAS','narracion'=>'ME GOLPERARON CUANDO ME BAJE DEL CALLO POR LA LAZARO.','folio'=>'F63NGS' ,'idEscolaridad'=>5,'idEstadoCivil'=>5,'idOcupacion'=>4,'idMunicipioOrigen'=>2102, 'created_at'=>Carbon::now()],
            ['idDireccion'  =>  4,  'esEmpresa'   =>  0, 'idRazon'=>2, 'fechaNac'=>'1995-02-11','statusCancelacion'=>0, 'edad'=>23, 'nombre' =>  'MARTA',  'primerAp' =>  'RAMIREZ', 'segundoAp'    =>  'CRUZ',  'rfc'    =>  'RACM950211S48' ,'curp' => 'RACM950211VH3VH3VZ','sexo'=>'HOMBRE','telefono'=>'6841534316','docIdentificacion'=> 3,'numDocIdentificacion'=>'6RG4WEF6W8E4F6QWFQ6W4D','narracion'=>'asufhaksdifahsdgijakshd iDHSFisdhfi hKFH Khfkihfk hkfuahsdkfhakshkaehfh awehfñwaehfk','folio'=>'MVG64M','idEscolaridad'=>5,'idEstadoCivil'=>5,'idOcupacion'=>4,'idMunicipioOrigen'=>1954, 'created_at'=>Carbon::now() ]
        ]);
        
        DB::table('preregistros')->insert([
            ['idDireccion'  =>  2,  'esEmpresa'   =>  0, 'idRazon'=>4, 'fechaNac'=>'1995-02-11','statusCancelacion'=>0, 'edad'=>23, 'nombre' =>  'PEDRO',  'primerAp' =>  'HERNANDEZ', 'segundoAp'    =>  'PEREZ',  'rfc'    =>  'PEPJ950211VH3', 'curp' => 'PEPJ950211VH3VZNL','sexo'=>'HOMBRE','telefono'=>'2284658970','docIdentificacion'=> 10,'numDocIdentificacion'=>'HVOZSDFA151ASC51EF65','narracion'=>'LE ACABAN DE ASALTAR Y SE LLEVANRON MI CELULAR','folio'=>'ULI655','tipoActa'=>'TELEFONO CELULAR' ,'idEscolaridad'=>5,'idEstadoCivil'=>5,'idOcupacion'=>4,'idMunicipioOrigen'=>1904,'created_at'=>Carbon::now() ],
            ['idDireccion'  =>  3,  'esEmpresa'   =>  0, 'idRazon'=>4, 'fechaNac'=>'1995-02-11','statusCancelacion'=>0, 'edad'=>23, 'nombre' =>  'PATRICIO',  'primerAp' =>  'RAMIREZ', 'segundoAp'    =>  'ACOSTA',  'rfc'    =>  'MAAA950211VH3', 'curp' => 'MAAA950211VH3VH3NL','sexo'=>'HOMBRE','telefono'=>'6841534316','docIdentificacion'=> 13,'numDocIdentificacion'=>'A416514A35FASDAS','narracion'=>'ME GOLPERARON CUANDO ME BAJE DEL CALLO POR LA LAZARO.','folio'=>'6C5VN4','tipoActa'=>'PLACAS DE CIRCULACION','idEscolaridad'=>5,'idEstadoCivil'=>5,'idOcupacion'=>4 ,'idMunicipioOrigen'=>1994,'created_at'=>Carbon::now() ],
            ['idDireccion'  =>  4,  'esEmpresa'   =>  0, 'idRazon'=>4, 'fechaNac'=>'1995-02-11','statusCancelacion'=>0, 'edad'=>23, 'nombre' =>  'JULIAN',  'primerAp' =>  'FERNANDEZ', 'segundoAp'    =>  'CRUZ',  'rfc'    =>  'RACM950211S48' ,'curp' => 'RACM950211VH3VH3VZ','sexo'=>'HOMBRE','telefono'=>'6841534316','docIdentificacion'=> 5,'numDocIdentificacion'=>'6SEF46WSE4FWE4F6WE4F','narracion'=>'asufhaksdifahsdgijakshd iDHSFisdhfi hKFH Khfkihfk hkfuahsdkfhakshkaehfh awehfñwaehfk','folio'=>'6R8Y4G' ,'tipoActa'=>'FACTURA DE VEHICULO/MOTOCICLETA','idEscolaridad'=>5,'idMunicipioOrigen'=>1944,'idEstadoCivil'=>5,'idOcupacion'=>4 ,'created_at'=>Carbon::now() ]
        ]);

        DB::table('preregistros')->insert([
            ['idDireccion'  =>  3,  'esEmpresa'   =>  1, 'idRazon'=>2,  'fechaNac'=>'1995-02-11',  'nombre' =>  'TALLER DE LOS HERMANOS SA DE CV',  'rfc' =>  'ASDF963258741','telefono'=>'22565534316','representanteLegal'=> 'LIC. JAUN PEREZ PEREZ','statusCancelacion'=>0,'narracion'=>'ROBO MI ESTABLECIMIENTO','folio'=>'63SXJ5' ,'created_at'=>Carbon::now() ],
            ['idDireccion'  =>  3,  'esEmpresa'   =>  1, 'idRazon'=>2,  'fechaNac'=>'1995-02-11',  'nombre' =>  'AUTOLAVADOS PEREZ SA DE CV',    'rfc' =>  'QWER764312589','telefono'=>'2241534316','representanteLegal'=> 'MARTA MORALES ACOSTA','statusCancelacion'=>0,'narracion'=>'ARMO UN ALBOROTO EN MI ESTABLECIMIENTO','folio'=>'3A2S1G' ,'created_at'=>Carbon::now() ],
            ['idDireccion'  =>  2,  'esEmpresa'   =>  1, 'idRazon'=>2,  'fechaNac'=>'1995-02-11',  'nombre' =>  'UNIVERSIDAD DE XALAPA',  'rfc' =>  'FSHD123679548','telefono'=>'22965534316','representanteLegal'=> 'FRANCISCO LOPEZ PEREZ','statusCancelacion'=>0,'narracion'=>'ASALTO MI ESTABLECIMIENTO','folio'=>'FJ3G54' ,'created_at'=>Carbon::now() ]
        ]);
    }
}
