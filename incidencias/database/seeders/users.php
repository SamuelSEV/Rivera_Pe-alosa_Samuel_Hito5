<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            
            'name' => 'admin',
            'email'=> 'admin@iespoligonosur.org',
            'email_verified_at'=> NULL,
            'password' => '$2y$10$seUw4Imu7tMm5u2V708BSuEwe9HQm1XAN.ZqttiHfJvgk7qbqmOz6',
            'rol' => 'administrador',
            'notificacion' => 1,
            'validacion' => 1

            
        ]);
    }
}
