<?php

namespace App\Repositories;

use App\Models\Installments;
use App\Repositories\Contracts\InstallmentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class InstallmentRepository implements InstallmentRepositoryInterface
{
    public function getFinancingApplication(string $financingApplicationId): Collection
    {
        return Installments::where('financing_application_id', $financingApplicationId)
            ->orderBy('installment_number', 'asc')
            ->get();
    }

    public function create(array $data): ?Installments
    {
        return Installments::create($data);
    }
}