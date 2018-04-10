<?php

use Illuminate\Database\Seeder;

class ProvidenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providencia_precautoria')->insert([
            [ 'nombre' => 'I. Vigilancia en el domicilio de la víctima o el ofendido'],
            [ 'nombre' => 'II. Protección policial de la víctima o el ofendido'],
            [ 'nombre' => 'III. Auxilio inmediato por integrantes de instituciones policiales, al domicilio donde se encuentre o se localice la víctima u ofendido en el momento de solicitarlo'],
            [ 'nombre' => 'IV. Auxilio de la fuerza pública para solicitar la inmediata entrega o devolución de objetos personales o documentos de identificación de la víctima o el ofendido, así como de sus ascendientes, descendientes o dependientes económicos'],
            [ 'nombre' => '
            V. Realización del inventario de los bienes muebles e inmuebles de propiedad común, propiedad de la víctima o respecto de los cuales sea titular de derechos, incluyendo los implementos de trabajo de la víctima o el ofendido '],
            [ 'nombre' => 'VI. Traslado de la víctima o el ofendido y de sus descendientes a refugio, albergue o domicilio temporal'],
            [ 'nombre' => 'VII. Reingreso de la víctima o el ofendido a su domicilio una vez que se salvaguarde su seguridad'],
            [ 'nombre' => 'VIII. Registro o inscripción en programas estatales de desarrollo personal, social, educativo o laboral'],
            [ 'nombre' => 'IX. Prohibición de realizar conductas de intimidación o molestia a la víctima o el ofendido o personas relacionadas con ellos'],
            [ 'nombre' => 'X. Suspensión temporal al agresor del régimen de visitas y convivencia con sus descendientes'],
            [ 'nombre' => 'XI. Posesión exclusiva de la víctima sobre el inmueble que sirvió de domicilio'],
            [ 'nombre' => 'XII. Obligación alimentaria provisional e inmediata'],
            [ 'nombre' => 'XIII. Las demás que determinen las disposiciones aplicables']
        ]);
    }
}
