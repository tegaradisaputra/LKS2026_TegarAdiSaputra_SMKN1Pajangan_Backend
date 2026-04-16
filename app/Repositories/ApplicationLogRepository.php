<?php

namespace App\Repositories;

use App\Models\ApplicationLogs;
use App\Repositories\Contracts\ApplicationLogRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ApplicationLogRepository implements ApplicationLogRepositoryInterface
{
    public function getFinancingApplication(string $financingApplicationId): Collection
    {
        return ApplicationLogs::where('financing_application_id', $financingApplicationId)
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function create(array $data): ?ApplicationLogs
    {
        return ApplicationLogs::create($data);
    }
}