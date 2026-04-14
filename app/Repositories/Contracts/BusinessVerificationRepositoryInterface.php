<?php

namespace App\Repositories\Contracts;

use App\Models\BusinessVerifications;
use Illuminate\Database\Eloquent\Collection;

interface BusinessVerificationRepositoryInterface
{
    public function all(): Collection;

    public function findById(string $id): ?BusinessVerifications;

    public function create(array $data): BusinessVerifications;

    public function update(string $id, array $data): BusinessVerifications;

    public function delete(string $id): BusinessVerifications;
}