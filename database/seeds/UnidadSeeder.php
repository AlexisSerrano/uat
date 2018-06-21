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
            [ 'id' => 1, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XX DE ACAYUCAN', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XX'],
            [ 'id' => 2, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE AGUA DULCE', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 3, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XXI DE COATZACOALCOS', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XI'],
            [ 'id' => 5, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE LAS CHOAPAS', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 6, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XII DE COATEPEC', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-II'],
            [ 'id' => 7, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE NARANJOS', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 8, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL I DE PÁNUCO', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 9, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL III DE TANTOYUCA', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-III'],
            [ 'id' => 10, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE CUAHUTEMOC', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 11, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL IV DE HUAYACOCOTLA', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-IV'],
            [ 'id' => 13, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE ALAMO', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 14, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE CERRO AZUL', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 15, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE TIHUATLÁN', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 16, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL VI DE TUXPAN', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-VI'],
            [ 'id' => 17, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL VIII DE PAPANTLA', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-VII'],
            [ 'id' => 18, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL VII DE POZA RICA', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-VII'],
            [ 'id' => 19, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE EL ESPINAL', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 20, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE GUTIERREZ ZAMORA', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 22, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE MARTINEZ DE LA TORRE', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 23, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL IX MISANTLA', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-IX'],
            [ 'id' => 24, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE NAOLINCO', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 25, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XI DE XALAPA', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XI'],
            [ 'id' => 26, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE PEROTE', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 27, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE TLAPACOYAN', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 28, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XIV DE CÓRDOBA', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-IV'],
            [ 'id' => 29, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XIII DE HUATUSCO', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-III'],
            [ 'id' => 30, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XV DE ORIZABA', 'idZona' => 3,'activo' => 1 ,'abreviacion'=> 'UAT/D-XV'],
            [ 'id' => 31, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE NOGALES', 'idZona' => 3,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 32, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE RIO BLANCO', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 33, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE CARDEL', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 34, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE MEDELLIN', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 35, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XVII DE VERACRUZ', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-VII'],
            [ 'id' => 36, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE BOCA DEL RIO', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 37, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE COTAXTLA', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 38, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE SOLEDAD DE DOBLADO', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 39, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE MANLIO FABIO ALTAMINRANO', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 40, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XVIII DE COSAMALOAPAN', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-VIII'],
            [ 'id' => 41, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XIX DE SAN ANDRÉS TUXTLA', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XIX'],
            [ 'id' => 42, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE TIERRA BLANCA', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 43, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE TRES VALLES', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 44, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE ISLA', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 45, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE PLAYA VICENTE', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 46, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE MINATITLÁN', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 47, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE COSOLEACAQUE', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 48, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE NANCHITAL', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 49, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE OLUTA', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 50, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE JALTIPAN', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 51, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE TATAHUICAPAN', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 52, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE JESUS CARRANZA', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 53, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE ANGEL R. CABADA', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 54, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE TLACOTALPAN', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 55, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE JOSE AZUETA', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 56, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XVI DE ZONGOLICA', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-VI'],
            [ 'id' => 57, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE IXHUATLANCILLO', 'idZona' => 3,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 58, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE CUITLAHUAC', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 59, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE PASO DEL MACHO', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 60, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE ZENTLA', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 61, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE CIUDAD MENDOZA', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 62, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE FORTIN DE LAS FLORES', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 63, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE AMATLAN DE LOS REYES', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 64, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE ITACZOQUITLAN', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 65, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE TEMPOAL', 'idZona' => 5,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 66, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL II DE OZULUAMA', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-II'],
            [ 'id' => 67, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE PUEBLO VIEJO', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 68, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL V DE CHICONTEPEC', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-V'],
            [ 'id' => 69, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE ALVARADO', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 70, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL X DE JALACINGO', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-X'],
            [ 'id' => 71, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE VEGA DE ALATORRE', 'idZona' => 8,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 72, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE PACHO VIEJO', 'idZona' => 8,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 73, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE BANDERILLA', 'idZona' => 8,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 74, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE PALMA SOLA', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 75, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE MALTRATA', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 76, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE TEZONAPAN', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 77, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE CARRILLO PUERTO', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> ''],
            [ 'id' => 78, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE ATOYAC', 'idZona' => 3 ,'activo' => 1,'abreviacion'=> '']
            
        ]);
        

    }
}
