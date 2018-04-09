<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            ['grupo' => 'Recepcion','descripcion' => 'Recepción','status' => '1'],
            ['grupo' => 'FOrientador','descripcion' => 'Fiscal orientador','status' => '1'],
            ['grupo' => 'FFacilitador','descripcion' => 'Fiscal facilitador','status' => '1'],
        ]);
    }
}
