<?php

namespace App\Repositories\Contracts;

use App\Models\ApplicationLogs;
use Illuminate\Database\Eloquent\Collection;

interface ApplicationLogRepositoryInterface
{
    public function getFinancingApplication(string $financingApplicationId): Collection;

    public function create(array $data): ?ApplicationLogs;
}