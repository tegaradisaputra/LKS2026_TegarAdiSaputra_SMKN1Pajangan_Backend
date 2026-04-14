<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function all(): Collection;

    public function findById(string $id): ?User;

    public function create(array $data): User;

    public function update(string $id, array $data): User;

    public function delete(string $id): User;
}