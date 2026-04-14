<?php

namespace App\Repositories\Contracts;

use App\Models\FinancingApplications;
use Illuminate\Database\Eloquent\Collection;

interface FinancingApplicationRepositoryInterface
{
    public function all(): Collection;

    public function findById(string $id): ?FinancingApplications;

    public function create(array $data): FinancingApplications;

    public function update(string $id, array $data): FinancingApplications;

    public function delete(string $id): FinancingApplications;
}