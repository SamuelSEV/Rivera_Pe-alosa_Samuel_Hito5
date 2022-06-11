<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class estados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            'name' => 'Nuevo'
        ]);

        DB::table('estados')->insert([
            'name' => 'En progreso'
        ]);

        DB::table('estados')->insert([
            'name' => 'Resuelto'
        ]);

        DB::table('estados')->insert([
            'name' => 'Derivado a una nueva incidencia'
        ]);
    }
}
