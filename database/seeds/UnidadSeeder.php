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
            [ 'id' => 1, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XX DE ACAYUCAN', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XX/ACA', 'direccion'=> 'GUERRERO 707, COL.CENTRO, CP.96000', 'telefono'=> '01(924)2455277'],
            [ 'id' => 2, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE AGUA DULCE', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 3, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XXI DE COATZACOALCOS', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XI/COA', 'direccion'=> 'AV.BENITO JUAREZ 406, COL.CENTRO, ENTRE 16 DE SEPT Y CARRANZA', 'telefono'=> '01(921)2145466'],
            [ 'id' => 5, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XXI DE LAS CHOAPAS', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XXI/CHO', 'direccion'=> 'BLVD.MEXICO 101, COL.MEXICO, CP.96980', 'telefono'=> '01(923)2375278'],
            [ 'id' => 6, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XII DE COATEPEC', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-II/CTC', 'direccion'=> 'AYUNTAMIENTO 2, COL.CENTRO, CP.91500', 'telefono'=> '01(228)8161014'],
            [ 'id' => 7, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE NARANJOS', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 8, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL I DE PÁNUCO', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-I/PAN', 'direccion'=> 'FRANCISCO COLORADO 307, COL.MAZA, CP.93996', 'telefono'=> '01(846)2662679'],
            [ 'id' => 9, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL III DE TANTOYUCA', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-III/TAN', 'direccion'=> 'GABINO BARREDA 207, COL.EL JAGUEY HIDALGO, CP.91126', 'telefono'=> '01(789)8930273'],
            [ 'id' => 10, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE CUAHUTEMOC', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 11, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL IV DE HUAYACOCOTLA', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-IV/HUA', 'direccion'=> 'CORREGIDORA S/N ESQ CERRADA ZONA CENTRO, CP.92600', 'telefono'=> '01(774)7580320'],
            [ 'id' => 13, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE ALAMO', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 14, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE CERRO AZUL', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 15, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE TIHUATLÁN', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 16, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL VI DE TUXPAN', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-VI/TUX', 'direccion'=> 'BLVD.MANUEL MAPLES AROE 224 ESQ URSULO GALVAN, COL.RUIZ CORTINES', 'telefono'=> '01(783)8340301'],
            [ 'id' => 17, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL VIII DE PAPANTLA', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-VIII/PAP', 'direccion'=> 'AV.FRANCISCO I. MADERO 723 ESQ BUGAMBILIAS, COL.DOCTORES, CP.93400', 'telefono'=> '01(784)8427149'],
            [ 'id' => 18, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL VII DE POZA RICA', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-VII/POZ', 'direccion'=> 'BLVD.LAZARO CARDENAS 800, COL.MORELOS, CP.93340', 'telefono'=> '01(782)8220137'],
            [ 'id' => 19, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE EL ESPINAL', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 20, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE GUTIERREZ ZAMORA', 'idZona' => 6 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 22, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL IX DE MARTINEZ DE LA TORRE', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-IX/MTZ', 'direccion'=> 'AV. PEDRO BELLI 520 ALTOS ESQ IGNACIO LOPEZ RAYON, CP.93600', 'telefono'=> '01(232)3248382'],
            [ 'id' => 23, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL IX DE MISANTLA', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-IX/MIS', 'direccion'=> 'LEONA VICARIO S/N ESQ CAMINO REAL, COL.LINDA VISTA, CP.93828', 'telefono'=> '01(235)3232938'],
            [ 'id' => 24, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE NAOLINCO', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 25, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XI DE XALAPA', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XI/XAL', 'direccion'=> 'CTO. GUIZAR Y VALENCIA 147, COL.RESERVA TERRITORIAL, CP.91096', 'telefono'=> '01(228)8149428'],
            [ 'id' => 26, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL X DE  PEROTE', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-X/PER', 'direccion'=> 'AGUSTIN MELGAR ESQ PONCIANO ARREAFA, COL.NIÑOS HEROES, CP.91270', 'telefono'=> '01(282)8252466'],
            [ 'id' => 27, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL X DE TLAPACOYAN', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-X/TLA', 'direccion'=> 'CARR FED. TEZIUTLA-PEROTE S/N, COL.CUARTEL SEGUNDO,PARADA DE AUTOBUSES CASA MARQUEZ, CP.93664', 'telefono'=> '01(225)3151759'],
            [ 'id' => 28, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XIV DE CÓRDOBA', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XIV/COR', 'direccion'=> 'NORTE 9 No.714, COL.CENTRO, CP.94500', 'telefono'=> '01(271)7149668'],
            [ 'id' => 29, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XIII DE HUATUSCO', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XIII/HUT', 'direccion'=> 'AV.1 NO.824 ENTRE CALLE 6 Y 8, COL.CENTRO, CP.94100', 'telefono'=> '01(273)7340157'],
            [ 'id' => 30, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XV DE ORIZABA', 'idZona' => 3,'activo' => 1 ,'abreviacion'=> 'UAT/D-XV/ORI', 'direccion'=> 'NORTE 8 No.140 ENTRE ORIENTE 3 Y 5, COL.CENTRO, CP.94300', 'telefono'=> '01(272)7263280'],
            [ 'id' => 31, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE NOGALES', 'idZona' => 3,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 32, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE RIO BLANCO', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 33, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XVII DE  CARDEL', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XVII/CAR', 'direccion'=> 'DR. JUAN MARTINEZ, ENTRE CARRILLO PUERTO Y LIBERTAD No.72, COL.CENTRO', 'telefono'=> '01(296)9628061'],
            [ 'id' => 34, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE MEDELLIN', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 35, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XVII DE VERACRUZ', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XVII/VER', 'direccion'=> 'KM 8 CARR. FED. VERACRUZ-XALAPA, PREDIO RUSTICO EL JOBO, CP.91963', 'telefono'=> '01(229)9382066'],
            [ 'id' => 36, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XVII DE  BOCA DEL RIO', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XVII/BOC', 'direccion'=> 'AV. RUIZ CORTINEZ 19 ENTRE MAR CANTAMBRICO Y CERRADA AVILA CAMACHO DEL FRACC. COSTA VERDE, CP.94294', 'telefono'=> '01(229)9351591'],
            [ 'id' => 37, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE COTAXTLA', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 38, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE SOLEDAD DE DOBLADO', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 39, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE MANLIO FABIO ALTAMINRANO', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 40, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XVIII DE COSAMALOAPAN', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XVIII/COS', 'direccion'=> 'BLVD. MIGUEL ALEMAN ESQ MIGUEL HIDALGO 103, COL.CENTRO, CP.95400', 'telefono'=> '01(288)8821046'],
            [ 'id' => 41, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XIX DE SAN ANDRÉS TUXTLA', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XIX/SNA', 'direccion'=> 'AV.INDEPENDENCIA ESQ VIRGILIO URIBE, ALTOS S/N, CP.95700', 'telefono'=> '01(294)9420403'],
            [ 'id' => 42, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XVIII DE  TIERRA BLANCA', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XVIII/TIB', 'direccion'=> 'AV.MIGUEL LERDO 1201, COL.LOMA DEL JAZMIN, CP.95100', 'telefono'=> '01(274)7432950'],
            [ 'id' => 43, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE TRES VALLES', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 44, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XIX DE ISLA', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XIX/ISL', 'direccion'=> 'AV.RAUL SANDOVAL 804, ZONA CENTRO, CP.95641', 'telefono'=> '01(283)8740114'],
            [ 'id' => 45, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE PLAYA VICENTE', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 46, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XXI DE MINATITLÁN', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XXI/MIN', 'direccion'=> 'GUILLERMO PRIETO 3, COL.SANTA CLARA, ENTRE 18 DE OCTUBRE Y IQUILPAN, CP.96730', 'telefono'=> '01(922)2231105'],
            [ 'id' => 47, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XXI DE COSOLEACAQUE', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XXI/COS', 'direccion'=> 'HEROES DE TOTOAPAN 49 ALTOS DEL BARRIO PRIMERO ENTRE CORREOS E IGNACIO ALLENDE, CP.96351', 'telefono'=> '01(922)2640461'],
            [ 'id' => 48, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE NANCHITAL', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 49, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE OLUTA', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 50, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE JALTIPAN', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 51, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE TATAHUICAPAN', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 52, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE JESUS CARRANZA', 'idZona' => 1 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 53, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE ANGEL R. CABADA', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 54, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE TLACOTALPAN', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 55, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE JOSE AZUETA', 'idZona' => 2 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 56, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XVI DE ZONGOLICA', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-VI', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 57, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE IXHUATLANCILLO', 'idZona' => 3,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 58, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE CUITLAHUAC', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 59, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE PASO DEL MACHO', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 60, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE ZENTLA', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 61, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE CIUDAD MENDOZA', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 62, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE FORTIN DE LAS FLORES', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 63, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE AMATLAN DE LOS REYES', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 64, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE ITACZOQUITLAN', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 65, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE TEMPOAL', 'idZona' => 5,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 66, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL II DE OZULUAMA', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-II/OZU', 'direccion'=> 'HIGUERONES S/N, COL.5 DE MAYO, CP.92080', 'telefono'=> '01(846)2570456'],
            [ 'id' => 67, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE PUEBLO VIEJO', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 68, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL V DE CHICONTEPEC', 'idZona' => 5 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-V/CHI', 'direccion'=> 'LEOVIGILDO LOPEZ HDEZ. S/N ESQ CON AVENIDA LOPEZ MATEOS, CP.92700', 'telefono'=> '01(746)8921012'],
            [ 'id' => 69, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL XVII DE ALVARADO', 'idZona' => 7 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-XVII/ALV', 'direccion'=> 'MIGUEL HIDALGO 100 ESQ 15 DE OCTUBRE, COL.CENTRO', 'telefono'=> '01(297)9732360'],
            [ 'id' => 70, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL X DE JALACINGO', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> 'UAT/D-X/JAL', 'direccion'=> 'CARR. FED. TEZIUTLAN-PEROTE S/N, COL.CUARTEL SEGUNDO,PARADA DE AUTOBUSES CASA MARQUEZ, CP.93664', 'telefono'=> ''],
            [ 'id' => 71, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE VEGA DE ALATORRE', 'idZona' => 8,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 72, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE PACHO VIEJO', 'idZona' => 8,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 73, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE BANDERILLA', 'idZona' => 8,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 74, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE PALMA SOLA', 'idZona' => 8 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 75, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE MALTRATA', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 76, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE TEZONAPAN', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 77, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE CARRILLO PUERTO', 'idZona' => 3 ,'activo' => 1 ,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> ''],
            [ 'id' => 78, 'descripcion' => 'UNIDAD DE ATENCIÓN TEMPRANA DE ATOYAC', 'idZona' => 3 ,'activo' => 1,'abreviacion'=> '', 'direccion'=> '', 'telefono'=> '']
            
        ]);
        

    }
}
