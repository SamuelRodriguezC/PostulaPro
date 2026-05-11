<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\ApplicationStatusEnum;
use App\Models\ApplicationStatus;

class ApplicationStatusSeeder extends Seeder
{
    public function run(): void
    {
        foreach (ApplicationStatusEnum::cases() as $status) {
            ApplicationStatus::updateOrCreate(
                ['slug' => $status->value],
                [
                    'name' => $status->getLabel(),
                    'order_index' => $status->getOrder(),
                ]
            );
        }
    }
}