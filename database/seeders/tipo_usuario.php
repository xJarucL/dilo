<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tipo_usuario extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_usuario')->insert([
            'nom_tipo_usuario' => "Administrador",
            'estatus' => "1"
        ]);
        DB::table('tipo_usuario')->insert([
            'nom_tipo_usuario' => "Normal",
            'estatus' => "1"
        ]);
    }
}
