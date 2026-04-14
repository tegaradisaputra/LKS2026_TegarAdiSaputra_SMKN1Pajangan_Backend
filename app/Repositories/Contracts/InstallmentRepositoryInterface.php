<?php

namespace App\Repositories\Contracts;

use App\Models\Installments;
use Illuminate\Database\Eloquent\Collection;

interface InstallmentRepositoryInterface
{
    public function getFinancingApplication(string $financingApplicationId): Collection;

    public function create(array $data): ?Installments;
}