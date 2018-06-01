<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(OcupacionSeeder::class);
        $this->call(EstadoCivilSeeder::class);
        $this->call(EscolaridadSeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(NacionalidadSeeder::class);
        $this->call(EtniaSeeder::class);
        $this->call(LenguaSeeder::class);
        $this->call(ModalidadSeeder::class);
        $this->call(DelitosSeeder::class);
        $this->call(UnidadSeeder::class);
         
        
        $this->call(EstadoSeeder::class);
        $this->call(MunicipioSeeder::class);
        
        $this->call(ColoniasChiapasSeeder::class);
        $this->call(ColoniasCDMXSeeder::class);
        $this->call(ColoniasHidalgoSeeder::class);
        $this->call(ColoniasOaxacaSeeder::class);
        $this->call(ColoniasPueblaSeeder::class);
        $this->call(ColoniasSanLuisPotosiSeeder::class);
        $this->call(ColoniasTabascoSeeder::class);
        $this->call(ColoniasTamaulipasSeeder::class);
        $this->call(ColoniasVeracruzSeeder::class);
        //semillas de colonias
        $this->call(ColoniasCampecheSeeder::class);
        $this->call(ColoniasMexicoSeeder::class);
        $this->call(ColoniasGuerreroSeeder::class);
        $this->call(ColoniasTlaxcalaSeeder::class);
        $this->call(ColoniasNuevoLeonSeeder::class);
        $this->call(ColoniasMorelosSeeder::class);
        $this->call(ColoniasQueretaroSeeder::class);
        $this->call(ColoniasMichoacanSeeder::class);
        $this->call(ColoniasGuanajuatoSeeder::class);


        //$this->call(LocalidadSeeder::class);
        //$this->call(LocalidadSeeder2::class);
        $this->call(LocalidadesChiapasSeeder::class);
        $this->call(LocalidadesCDMXSeeder::class);
        $this->call(LocalidadesHidalgoSeeder::class);
        $this->call(LocalidadesOaxacaSeeder::class);
        $this->call(LocalidadesPueblaSeeder::class);
        $this->call(LocalidadesSanLuisPotosiSeeder::class);
        $this->call(LocalidadesTabascoSeeder::class);
        $this->call(LocalidadesTamaulipasSeeder::class);
        $this->call(LocalidadesVeracruzSeeder::class);
        //semillas de localidades
        $this->call(LocalidadesCampecheSeeder::class);
        $this->call(LocalidadesGuanajuatoSeeder::class);
        $this->call(LocalidadesGuerreroSeeder::class);
        $this->call(LocalidadesMexicoSeeder::class);
        $this->call(LocalidadesMichoacanSeeder::class);
        $this->call(LocalidadesMorelosSeeder::class);
        $this->call(LocalidadesNuevoLeonSeeder::class);
        $this->call(LocalidadesQueretaroSeeder::class);
        $this->call(LocalidadesTlaxcalaSeeder::class);
        
        $this->call(RazonSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(RedireccionesSeeder::class);
        $this->call(LugarSeeder::class);
        $this->call(ZonaSeeder::class);
        
        $this->call(ProvidenciasSeeder::class);
        $this->call(EjecutorSeeder::class);
        $this->call(EstatusCasoSeeder::class);
        $this->call(IdentificacionSeeder::class);
        
        $this->call(PruebaSeeder::class);
        $this->call(Agrupacion1Seeder::class);
        $this->call(Agrupacion2Seeder::class);
        $this->call(AseguradoraSeeder::class);
        $this->call(TipoVehiculoSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(ProcedenciaSeeder::class);
        $this->call(TipoUsoSeeder::class);
        $this->call(ActasSeeder::class);
        $this->call(ClaseVehiculoSeeder::class);
        $this->call(MarcaSeeder::class);
        // $this->call(SubmarcaSeeder::class);
        // $this->call(SubmarcaSeeder2::class);


    
    
    }

    
}
