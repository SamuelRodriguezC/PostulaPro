<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Platform;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platforms = [
            [
                'name' => 'Computrabajo',
                'url' => 'https://www.computrabajo.com',
                'logo_path' => 'platform-logos/computrabajo_logo.png',
            ],
            [
                'name' => 'Magneto',
                'url' => 'https://www.magneto365.com',
                'logo_path' => 'platform-logos/magneto_logo.png',
            ],
            [
                'name' => 'Elempleo',
                'url' => 'https://www.elempleo.com',
                'logo_path' => 'platform-logos/elempleo_logo.png',
            ],
            [
                'name' => 'LinkedIn',
                'url' => 'https://www.linkedin.com',
                'logo_path' => 'platform-logos/linkedin_logo.png',
            ],
        ];

        foreach ($platforms as $platform) {
            Platform::create($platform);
        }
    }
}