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
	        [ 'id' => 1, 'Descripcion' => 'COATZACOALCOS', 'Activo' => 1],
            [ 'id' => 2, 'Descripcion' => 'COSAMALOAPAN', 'Activo' => 1],
            [ 'id' => 3, 'Descripcion' => 'CÓRDOBA', 'Activo' => 1],
            [ 'id' => 4, 'Descripcion' => 'INVESTIGACIONES MINISTERIALES', 'Activo' => 1],
            [ 'id' => 5, 'Descripcion' => 'TANTOYUCA', 'Activo' => 1],
            [ 'id' => 6, 'Descripcion' => 'TUXPAN', 'Activo' => 1],
            [ 'id' => 7, 'Descripcion' => 'VERACRUZ', 'Activo' => 1],
            [ 'id' => 8, 'Descripcion' => 'XALAPA', 'Activo' => 1]
        ]);
        
        DB::table('unidad')->insert([
            [ 'id' => 1, 'Descripcion' => 'ACAYUCAN', 'ZonaId' => 1 ,'Activo' => 1],
            [ 'id' => 2, 'Descripcion' => 'AGUA DULCE', 'ZonaId' => 1 ,'Activo' => 1],
            [ 'id' => 3, 'Descripcion' => 'COATZACOALCOS', 'ZonaId' => 1 ,'Activo' => 1],
            [ 'id' => 5, 'Descripcion' => 'LAS CHOAPAS', 'ZonaId' => 1 ,'Activo' => 1],
            [ 'id' => 46, 'Descripcion' => 'MINATITLÁN', 'ZonaId' => 1 ,'Activo' => 1],
            [ 'id' => 47, 'Descripcion' => 'COSOLEACAQUE', 'ZonaId' => 1 ,'Activo' => 1],
            [ 'id' => 48, 'Descripcion' => 'NANCHITAL', 'ZonaId' => 1 ,'Activo' => 1],
            [ 'id' => 49, 'Descripcion' => 'OLUTA', 'ZonaId' => 1 ,'Activo' => 1],
            [ 'id' => 50, 'Descripcion' => 'JALTIPAN', 'ZonaId' => 1 ,'Activo' => 1],
            [ 'id' => 51, 'Descripcion' => 'TATAHUICAPAN', 'ZonaId' => 1 ,'Activo' => 1],
            [ 'id' => 52, 'Descripcion' => 'JESUS CARRANZA', 'ZonaId' => 1 ,'Activo' => 1],
            [ 'id' => 53, 'Descripcion' => 'ANGEL R. CABADA', 'ZonaId' => 2 ,'Activo' => 1],
            [ 'id' => 54, 'Descripcion' => 'TLACOTALPAN', 'ZonaId' => 2 ,'Activo' => 1],
            [ 'id' => 55, 'Descripcion' => 'JOSE AZUETA', 'ZonaId' => 2 ,'Activo' => 1],
            [ 'id' => 40, 'Descripcion' => 'COSAMALOAPAN', 'ZonaId' => 2 ,'Activo' => 1],
            [ 'id' => 41, 'Descripcion' => 'SAN ANDRES TUXXTLA', 'ZonaId' => 2 ,'Activo' => 1],
            [ 'id' => 42, 'Descripcion' => 'TIERRA BLANCA', 'ZonaId' => 2 ,'Activo' => 1],
            [ 'id' => 43, 'Descripcion' => 'TRES VALLES', 'ZonaId' => 2 ,'Activo' => 1],
            [ 'id' => 44, 'Descripcion' => 'ISLA', 'ZonaId' => 2 ,'Activo' => 1],
            [ 'id' => 45, 'Descripcion' => 'PLAYA VICENTE', 'ZonaId' => 2 ,'Activo' => 1],
            [ 'id' => 28, 'Descripcion' => 'CORDOBA', 'ZonaId' => 3 ,'Activo' => 1],
            [ 'id' => 29, 'Descripcion' => 'HUATUSCO', 'ZonaId' => 3 ,'Activo' => 1],
            [ 'id' => 30, 'Descripcion' => 'ORIZABA', 'ZonaId' => 3,'Activo' => 1],
            [ 'id' => 31, 'Descripcion' => 'NOGALES', 'ZonaId' => 3,'Activo' => 1],
            [ 'id' => 32, 'Descripcion' => 'RIO BLANCO', 'ZonaId' => 3 ,'Activo' => 1],
            [ 'id' => 56, 'Descripcion' => 'ZONGOLICA', 'ZonaId' => 3 ,'Activo' => 1],
            [ 'id' => 57, 'Descripcion' => 'IXHUATLANCILLO', 'ZonaId' => 3,'Activo' => 1],
            [ 'id' => 58, 'Descripcion' => 'CUITLAHUAC', 'ZonaId' => 3 ,'Activo' => 1],
            [ 'id' => 59, 'Descripcion' => 'PASO DEL MACHO', 'ZonaId' => 3 ,'Activo' => 1],
            [ 'id' => 60, 'Descripcion' => 'ZENTLA', 'ZonaId' => 3 ,'Activo' => 1],
            [ 'id' => 61, 'Descripcion' => 'CIUDAD MENDOZA', 'ZonaId' => 3 ,'Activo' => 1],
            [ 'id' => 62, 'Descripcion' => 'FORTIN DE LAS FLORES', 'ZonaId' => 3 ,'Activo' => 1],
            [ 'id' => 63, 'Descripcion' => 'AMATLAN DE LOS REYES', 'ZonaId' => 3 ,'Activo' => 1],
            [ 'id' => 64, 'Descripcion' => 'ITACZOQUITLAN', 'ZonaId' => 3 ,'Activo' => 1],
            [ 'id' => 75, 'Descripcion' => 'MALTRATA', 'ZonaId' => 3 ,'Activo' => 1],
            [ 'id' => 76, 'Descripcion' => 'TEZONAPAN', 'ZonaId' => 3 ,'Activo' => 1],
            [ 'id' => 77, 'Descripcion' => 'CARRILLO PUERTO', 'ZonaId' => 3 ,'Activo' => 1],
            [ 'id' => 78, 'Descripcion' => 'ATOYAC', 'ZonaId' => 3 ,'Activo' => 1],
            [ 'id' => 65, 'Descripcion' => 'TEMPOAL', 'ZonaId' => 5,'Activo' => 1],
            [ 'id' => 66, 'Descripcion' => 'OZULUAMA', 'ZonaId' => 5 ,'Activo' => 1],
            [ 'id' => 67, 'Descripcion' => 'PUEBLO VIEJO', 'ZonaId' => 5 ,'Activo' => 1],
            [ 'id' => 68, 'Descripcion' => 'CHICONTEPEC', 'ZonaId' => 5 ,'Activo' => 1],
            [ 'id' => 7, 'Descripcion' => 'NARANJOS', 'ZonaId' => 5 ,'Activo' => 1],
            [ 'id' => 8, 'Descripcion' => 'PANUCO', 'ZonaId' => 5 ,'Activo' => 1],
            [ 'id' => 9, 'Descripcion' => 'TANTOYUCA', 'ZonaId' => 5 ,'Activo' => 1],
            [ 'id' => 10, 'Descripcion' => 'CUAHUTEMOC', 'ZonaId' => 5 ,'Activo' => 1],
            [ 'id' => 11, 'Descripcion' => 'HUAYACOCOTLA', 'ZonaId' => 5 ,'Activo' => 1],
            [ 'id' => 13, 'Descripcion' => 'ALAMO', 'ZonaId' => 6 ,'Activo' => 1],
            [ 'id' => 14, 'Descripcion' => 'CERRO AZUL', 'ZonaId' => 6 ,'Activo' => 1],
            [ 'id' => 15, 'Descripcion' => 'TIHUATLÁN', 'ZonaId' => 6 ,'Activo' => 1],
            [ 'id' => 16, 'Descripcion' => 'TUXPAN', 'ZonaId' => 6 ,'Activo' => 1],
            [ 'id' => 17, 'Descripcion' => 'PAPANTLA', 'ZonaId' => 6 ,'Activo' => 1],
            [ 'id' => 18, 'Descripcion' => 'POZA RICA', 'ZonaId' => 6 ,'Activo' => 1],
            [ 'id' => 19, 'Descripcion' => 'EL ESPINAL', 'ZonaId' => 6 ,'Activo' => 1],
            [ 'id' => 20, 'Descripcion' => 'GUTIERREZ ZAMORA', 'ZonaId' => 6 ,'Activo' => 1],
            [ 'id' => 33, 'Descripcion' => 'CARDEL', 'ZonaId' => 7 ,'Activo' => 1],
            [ 'id' => 34, 'Descripcion' => 'MEDELLIN', 'ZonaId' => 7 ,'Activo' => 1],
            [ 'id' => 35, 'Descripcion' => 'VERACRUZ', 'ZonaId' => 7 ,'Activo' => 1],
            [ 'id' => 36, 'Descripcion' => 'BOCA DEL RIO', 'ZonaId' => 7 ,'Activo' => 1],
            [ 'id' => 37, 'Descripcion' => 'COTAXTLA', 'ZonaId' => 7 ,'Activo' => 1],
            [ 'id' => 38, 'Descripcion' => 'SOLEDAD DE DOBLADO', 'ZonaId' => 7 ,'Activo' => 1],
            [ 'id' => 39, 'Descripcion' => 'MANLIO FABIO ALTAMINRANO', 'ZonaId' => 7 ,'Activo' => 1],
            [ 'id' => 69, 'Descripcion' => 'ALVARADO', 'ZonaId' => 7 ,'Activo' => 1],
            [ 'id' => 70, 'Descripcion' => 'JALACINGO', 'ZonaId' => 8 ,'Activo' => 1],
            [ 'id' => 71, 'Descripcion' => 'VEGA DE ALATORRE', 'ZonaId' => 8,'Activo' => 1],
            [ 'id' => 72, 'Descripcion' => 'PACHO VIEJO', 'ZonaId' => 8,'Activo' => 1],
            [ 'id' => 73, 'Descripcion' => 'BANDERILLA', 'ZonaId' => 8,'Activo' => 1],
            [ 'id' => 74, 'Descripcion' => 'PALMA SOLA', 'ZonaId' => 8 ,'Activo' => 1],
            [ 'id' => 6, 'Descripcion' => 'COATEPEC', 'ZonaId' => 8 ,'Activo' => 1],
            [ 'id' => 22, 'Descripcion' => 'MARTINEZ DE LA TORRE', 'ZonaId' => 8 ,'Activo' => 1],
            [ 'id' => 23, 'Descripcion' => 'MISANTLA', 'ZonaId' => 8 ,'Activo' => 1],
            [ 'id' => 24, 'Descripcion' => 'NAOLINCO', 'ZonaId' => 8 ,'Activo' => 1],
            [ 'id' => 25, 'Descripcion' => 'XALAPA', 'ZonaId' => 8 ,'Activo' => 1],
            [ 'id' => 26, 'Descripcion' => 'PEROTE', 'ZonaId' => 8 ,'Activo' => 1],
            [ 'id' => 27, 'Descripcion' => 'TLAPACOYAN', 'ZonaId' => 8 ,'Activo' => 1]
            

	    
        ]);
        

    }
}
