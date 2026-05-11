<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['name' => 'Enviada', 'order_index' => 1],
            ['name' => 'En proceso', 'order_index' => 2],
            ['name' => 'Entrevista', 'order_index' => 3],
            ['name' => 'Oferta', 'order_index' => 4],
            ['name' => 'Rechazada', 'order_index' => 5],
        ];

        DB::table('application_statuses')->insert($statuses);
    }
}