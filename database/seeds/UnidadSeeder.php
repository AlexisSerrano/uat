<?php

use Illuminate\Database\Seeder;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('zona')->insert([
	        [ 'id' => 1, 'descripcion' => 'COATZACOALCOS', 'activo' => 1],
            [ 'id' => 2, 'descripcion' => 'COSAMALOAPAN', 'activo' => 1],
            [ 'id' => 3, 'descripcion' => 'CÓRDOBA', 'activo' => 1],
            [ 'id' => 4, 'descripcion' => 'INVESTIGACIONES MINISTERIALES', 'activo' => 1],
            [ 'id' => 5, 'descripcion' => 'TANTOYUCA', 'activo' => 1],
            [ 'id' => 6, 'descripcion' => 'TUXPAN', 'activo' => 1],
            [ 'id' => 7, 'descripcion' => 'VERACRUZ', 'activo' => 1],
            [ 'id' => 8, 'descripcion' => 'XALAPA', 'activo' => 1]
        ]);
        
        DB::table('unidad')->insert([
            [ 'id' => 1, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XX DE ACAYUCAN', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> 'UAT-DXX'],
            [ 'id' => 2, 'descripcion' => 'AGUA DULCE', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 3, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XXI DE COATZACOALCOS', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> 'UAT-DXI'],
            [ 'id' => 5, 'descripcion' => 'LAS CHOAPAS', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 6, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XII DE COATEPEC', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> 'UAT-DII'],
            [ 'id' => 7, 'descripcion' => 'NARANJOS', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 8, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL I DE PÁNUCO', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 9, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL III DE TANTOYUCA', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> 'UAT-DIII'],
            [ 'id' => 10, 'descripcion' => 'CUAHUTEMOC', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 11, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL IV DE HUAYACOCOTLA', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> 'UAT-DIV'],
            [ 'id' => 13, 'descripcion' => 'ALAMO', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 14, 'descripcion' => 'CERRO AZUL', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 15, 'descripcion' => 'TIHUATLÁN', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 16, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL VI DE TUXPAN', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> 'UAT-DVI'],
            [ 'id' => 17, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL VIII DE PAPANTLA', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> 'UAT-DVII'],
            [ 'id' => 18, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL VII DE POZA RICA', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> 'UAT-DVII'],
            [ 'id' => 19, 'descripcion' => 'EL ESPINAL', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 20, 'descripcion' => 'GUTIERREZ ZAMORA', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 22, 'descripcion' => 'MARTINEZ DE LA TORRE', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 23, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL IX MISANTLA', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> 'UAT-DIX'],
            [ 'id' => 24, 'descripcion' => 'NAOLINCO', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 25, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XI DE XALAPA', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> 'UAT-DXI'],
            [ 'id' => 26, 'descripcion' => 'PEROTE', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 27, 'descripcion' => 'TLAPACOYAN', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 28, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XIV DE CÓRDOBA', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> 'UAT-DIV'],
            [ 'id' => 29, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XIII DE HUATUSCO', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> 'UAT-DIII'],
            [ 'id' => 30, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XV DE ORIZABA', 'idZona' => 3,'activo' => 1 ,'abreviacion'=> 'UAT-DXV'],
            [ 'id' => 31, 'descripcion' => 'NOGALES', 'idZona' => 3,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 32, 'descripcion' => 'RIO BLANCO', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 33, 'descripcion' => 'CARDEL', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 34, 'descripcion' => 'MEDELLIN', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 35, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XVII DE VERACRUZ', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> 'UAT-DVII'],
            [ 'id' => 36, 'descripcion' => 'BOCA DEL RIO', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 37, 'descripcion' => 'COTAXTLA', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 38, 'descripcion' => 'SOLEDAD DE DOBLADO', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 39, 'descripcion' => 'MANLIO FABIO ALTAMINRANO', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 40, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XVIII DE COSAMALOAPAN', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> 'UAT-DVIII'],
            [ 'id' => 41, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XIX DE SAN ANDRÉS TUXTLA', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> 'UAT-DXIX'],
            [ 'id' => 42, 'descripcion' => 'TIERRA BLANCA', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 43, 'descripcion' => 'TRES VALLES', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 44, 'descripcion' => 'ISLA', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 45, 'descripcion' => 'PLAYA VICENTE', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 46, 'descripcion' => 'MINATITLÁN', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 47, 'descripcion' => 'COSOLEACAQUE', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 48, 'descripcion' => 'NANCHITAL', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 49, 'descripcion' => 'OLUTA', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 50, 'descripcion' => 'JALTIPAN', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 51, 'descripcion' => 'TATAHUICAPAN', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 52, 'descripcion' => 'JESUS CARRANZA', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 53, 'descripcion' => 'ANGEL R. CABADA', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 54, 'descripcion' => 'TLACOTALPAN', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 55, 'descripcion' => 'JOSE AZUETA', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 56, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XVI DE ZONGOLICA', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> 'UAT-DVI'],
            [ 'id' => 57, 'descripcion' => 'IXHUATLANCILLO', 'idZona' => 3,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 58, 'descripcion' => 'CUITLAHUAC', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 59, 'descripcion' => 'PASO DEL MACHO', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 60, 'descripcion' => 'ZENTLA', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 61, 'descripcion' => 'CIUDAD MENDOZA', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 62, 'descripcion' => 'FORTIN DE LAS FLORES', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 63, 'descripcion' => 'AMATLAN DE LOS REYES', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 64, 'descripcion' => 'ITACZOQUITLAN', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 65, 'descripcion' => 'TEMPOAL', 'idZona' => 5,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 66, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL II DE OZULUAMA', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> 'UAT-DII'],
            [ 'id' => 67, 'descripcion' => 'PUEBLO VIEJO', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 68, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL V DE CHICONTEPEC', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> 'UAT-DV'],
            [ 'id' => 69, 'descripcion' => 'ALVARADO', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 70, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL X DE JALACINGO', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> 'UAT-DX'],
            [ 'id' => 71, 'descripcion' => 'VEGA DE ALATORRE', 'idZona' => 8,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 72, 'descripcion' => 'PACHO VIEJO', 'idZona' => 8,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 73, 'descripcion' => 'BANDERILLA', 'idZona' => 8,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 74, 'descripcion' => 'PALMA SOLA', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 75, 'descripcion' => 'MALTRATA', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 76, 'descripcion' => 'TEZONAPAN', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 77, 'descripcion' => 'CARRILLO PUERTO', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 78, 'descripcion' => 'ATOYAC', 'idZona' => 3 ,'activo' =>  ,'abreviacion'=> ''1]
            

	    
        ]);
        

    }
}
