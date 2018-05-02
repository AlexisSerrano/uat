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
            [ 'id' => 1, 'descripcion' => 'ACAYUCAN', 'idZona' => 1 ,'activo' => 1],
            [ 'id' => 2, 'descripcion' => 'AGUA DULCE', 'idZona' => 1 ,'activo' => 1],
            [ 'id' => 3, 'descripcion' => 'COATZACOALCOS', 'idZona' => 1 ,'activo' => 1],
            [ 'id' => 5, 'descripcion' => 'LAS CHOAPAS', 'idZona' => 1 ,'activo' => 1],
            [ 'id' => 6, 'descripcion' => 'COATEPEC', 'idZona' => 8 ,'activo' => 1],
            [ 'id' => 7, 'descripcion' => 'NARANJOS', 'idZona' => 5 ,'activo' => 1],
            [ 'id' => 8, 'descripcion' => 'PANUCO', 'idZona' => 5 ,'activo' => 1],
            [ 'id' => 9, 'descripcion' => 'TANTOYUCA', 'idZona' => 5 ,'activo' => 1],
            [ 'id' => 10, 'descripcion' => 'CUAHUTEMOC', 'idZona' => 5 ,'activo' => 1],
            [ 'id' => 11, 'descripcion' => 'HUAYACOCOTLA', 'idZona' => 5 ,'activo' => 1],
            [ 'id' => 13, 'descripcion' => 'ALAMO', 'idZona' => 6 ,'activo' => 1],
            [ 'id' => 14, 'descripcion' => 'CERRO AZUL', 'idZona' => 6 ,'activo' => 1],
            [ 'id' => 15, 'descripcion' => 'TIHUATLÁN', 'idZona' => 6 ,'activo' => 1],
            [ 'id' => 16, 'descripcion' => 'TUXPAN', 'idZona' => 6 ,'activo' => 1],
            [ 'id' => 17, 'descripcion' => 'PAPANTLA', 'idZona' => 6 ,'activo' => 1],
            [ 'id' => 18, 'descripcion' => 'POZA RICA', 'idZona' => 6 ,'activo' => 1],
            [ 'id' => 19, 'descripcion' => 'EL ESPINAL', 'idZona' => 6 ,'activo' => 1],
            [ 'id' => 20, 'descripcion' => 'GUTIERREZ ZAMORA', 'idZona' => 6 ,'activo' => 1],
            [ 'id' => 22, 'descripcion' => 'MARTINEZ DE LA TORRE', 'idZona' => 8 ,'activo' => 1],
            [ 'id' => 23, 'descripcion' => 'MISANTLA', 'idZona' => 8 ,'activo' => 1],
            [ 'id' => 24, 'descripcion' => 'NAOLINCO', 'idZona' => 8 ,'activo' => 1],
            [ 'id' => 25, 'descripcion' => 'XALAPA', 'idZona' => 8 ,'activo' => 1],
            [ 'id' => 26, 'descripcion' => 'PEROTE', 'idZona' => 8 ,'activo' => 1],
            [ 'id' => 27, 'descripcion' => 'TLAPACOYAN', 'idZona' => 8 ,'activo' => 1],
            [ 'id' => 28, 'descripcion' => 'CORDOBA', 'idZona' => 3 ,'activo' => 1],
            [ 'id' => 29, 'descripcion' => 'HUATUSCO', 'idZona' => 3 ,'activo' => 1],
            [ 'id' => 30, 'descripcion' => 'ORIZABA', 'idZona' => 3,'activo' => 1],
            [ 'id' => 31, 'descripcion' => 'NOGALES', 'idZona' => 3,'activo' => 1],
            [ 'id' => 32, 'descripcion' => 'RIO BLANCO', 'idZona' => 3 ,'activo' => 1],
            [ 'id' => 33, 'descripcion' => 'CARDEL', 'idZona' => 7 ,'activo' => 1],
            [ 'id' => 34, 'descripcion' => 'MEDELLIN', 'idZona' => 7 ,'activo' => 1],
            [ 'id' => 35, 'descripcion' => 'VERACRUZ', 'idZona' => 7 ,'activo' => 1],
            [ 'id' => 36, 'descripcion' => 'BOCA DEL RIO', 'idZona' => 7 ,'activo' => 1],
            [ 'id' => 37, 'descripcion' => 'COTAXTLA', 'idZona' => 7 ,'activo' => 1],
            [ 'id' => 38, 'descripcion' => 'SOLEDAD DE DOBLADO', 'idZona' => 7 ,'activo' => 1],
            [ 'id' => 39, 'descripcion' => 'MANLIO FABIO ALTAMINRANO', 'idZona' => 7 ,'activo' => 1],
            [ 'id' => 40, 'descripcion' => 'COSAMALOAPAN', 'idZona' => 2 ,'activo' => 1],
            [ 'id' => 41, 'descripcion' => 'SAN ANDRES TUXXTLA', 'idZona' => 2 ,'activo' => 1],
            [ 'id' => 42, 'descripcion' => 'TIERRA BLANCA', 'idZona' => 2 ,'activo' => 1],
            [ 'id' => 43, 'descripcion' => 'TRES VALLES', 'idZona' => 2 ,'activo' => 1],
            [ 'id' => 44, 'descripcion' => 'ISLA', 'idZona' => 2 ,'activo' => 1],
            [ 'id' => 45, 'descripcion' => 'PLAYA VICENTE', 'idZona' => 2 ,'activo' => 1],
            [ 'id' => 46, 'descripcion' => 'MINATITLÁN', 'idZona' => 1 ,'activo' => 1],
            [ 'id' => 47, 'descripcion' => 'COSOLEACAQUE', 'idZona' => 1 ,'activo' => 1],
            [ 'id' => 48, 'descripcion' => 'NANCHITAL', 'idZona' => 1 ,'activo' => 1],
            [ 'id' => 49, 'descripcion' => 'OLUTA', 'idZona' => 1 ,'activo' => 1],
            [ 'id' => 50, 'descripcion' => 'JALTIPAN', 'idZona' => 1 ,'activo' => 1],
            [ 'id' => 51, 'descripcion' => 'TATAHUICAPAN', 'idZona' => 1 ,'activo' => 1],
            [ 'id' => 52, 'descripcion' => 'JESUS CARRANZA', 'idZona' => 1 ,'activo' => 1],
            [ 'id' => 53, 'descripcion' => 'ANGEL R. CABADA', 'idZona' => 2 ,'activo' => 1],
            [ 'id' => 54, 'descripcion' => 'TLACOTALPAN', 'idZona' => 2 ,'activo' => 1],
            [ 'id' => 55, 'descripcion' => 'JOSE AZUETA', 'idZona' => 2 ,'activo' => 1],
            [ 'id' => 56, 'descripcion' => 'ZONGOLICA', 'idZona' => 3 ,'activo' => 1],
            [ 'id' => 57, 'descripcion' => 'IXHUATLANCILLO', 'idZona' => 3,'activo' => 1],
            [ 'id' => 58, 'descripcion' => 'CUITLAHUAC', 'idZona' => 3 ,'activo' => 1],
            [ 'id' => 59, 'descripcion' => 'PASO DEL MACHO', 'idZona' => 3 ,'activo' => 1],
            [ 'id' => 60, 'descripcion' => 'ZENTLA', 'idZona' => 3 ,'activo' => 1],
            [ 'id' => 61, 'descripcion' => 'CIUDAD MENDOZA', 'idZona' => 3 ,'activo' => 1],
            [ 'id' => 62, 'descripcion' => 'FORTIN DE LAS FLORES', 'idZona' => 3 ,'activo' => 1],
            [ 'id' => 63, 'descripcion' => 'AMATLAN DE LOS REYES', 'idZona' => 3 ,'activo' => 1],
            [ 'id' => 64, 'descripcion' => 'ITACZOQUITLAN', 'idZona' => 3 ,'activo' => 1],
            [ 'id' => 65, 'descripcion' => 'TEMPOAL', 'idZona' => 5,'activo' => 1],
            [ 'id' => 66, 'descripcion' => 'OZULUAMA', 'idZona' => 5 ,'activo' => 1],
            [ 'id' => 67, 'descripcion' => 'PUEBLO VIEJO', 'idZona' => 5 ,'activo' => 1],
            [ 'id' => 68, 'descripcion' => 'CHICONTEPEC', 'idZona' => 5 ,'activo' => 1],
            [ 'id' => 69, 'descripcion' => 'ALVARADO', 'idZona' => 7 ,'activo' => 1],
            [ 'id' => 70, 'descripcion' => 'JALACINGO', 'idZona' => 8 ,'activo' => 1],
            [ 'id' => 71, 'descripcion' => 'VEGA DE ALATORRE', 'idZona' => 8,'activo' => 1],
            [ 'id' => 72, 'descripcion' => 'PACHO VIEJO', 'idZona' => 8,'activo' => 1],
            [ 'id' => 73, 'descripcion' => 'BANDERILLA', 'idZona' => 8,'activo' => 1],
            [ 'id' => 74, 'descripcion' => 'PALMA SOLA', 'idZona' => 8 ,'activo' => 1],
            [ 'id' => 75, 'descripcion' => 'MALTRATA', 'idZona' => 3 ,'activo' => 1],
            [ 'id' => 76, 'descripcion' => 'TEZONAPAN', 'idZona' => 3 ,'activo' => 1],
            [ 'id' => 77, 'descripcion' => 'CARRILLO PUERTO', 'idZona' => 3 ,'activo' => 1],
            [ 'id' => 78, 'descripcion' => 'ATOYAC', 'idZona' => 3 ,'activo' => 1]
            

	    
        ]);
        

    }
}
