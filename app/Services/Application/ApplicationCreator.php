<?php

namespace App\Services\Application;

use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Enums\ApplicationStatusEnum;
use Illuminate\Support\Facades\DB;

class ApplicationCreator
{
    public function create(array $data): Application
    {
        return DB::transaction(function () use ($data) {

            $sentStatus = ApplicationStatus::getBySlug(
                ApplicationStatusEnum::SENT->value
            );

            $data['application_status_id'] = $sentStatus->id;

            $application = Application::create($data);

            return $application;
        });
    }
}