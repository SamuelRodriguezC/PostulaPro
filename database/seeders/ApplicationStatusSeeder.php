<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['slug' => 'enviada', 'name' => 'Enviada', 'order_index' => 1],
            ['slug' => 'in_process', 'name' => 'En proceso', 'order_index' => 2],
            ['slug' => 'interview', 'name' => 'Entrevista', 'order_index' => 3],
            ['slug' => 'offer', 'name' => 'Oferta', 'order_index' => 4],
            ['slug' => 'rejected', 'name' => 'Rechazada', 'order_index' => 5],
        ];

        DB::table('application_statuses')->insert($statuses);
    }
}