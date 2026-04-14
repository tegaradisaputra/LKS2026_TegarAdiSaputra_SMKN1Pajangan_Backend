<?php

namespace App\Repositories;

use App\Models\BusinessVerifications;
use App\Repositories\Contracts\BusinessVerificationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class BusinessVerificationRepository implements BusinessVerificationRepositoryInterface
{
    public function all(): Collection
    {
        // Implementasi logika untuk mendapatkan semua Business
        return BusinessVerifications::orderBy('created_at', 'desc')->get();
    }
    public function findById(string $id): ?BusinessVerifications
    {
        return BusinessVerifications::find($id);
    }
    public function create(array $data): BusinessVerifications
    {
        // Implementasi logika untuk membuat Business baru
        return BusinessVerifications::create($data);
    }
    public function update(string $id, array $data): BusinessVerifications
    {
        // Implementasi logika untuk memperbarui Business
        $businessVerifications = BusinessVerifications::findOrFail($id);
        $businessVerifications->update($data);
        return $businessVerifications;
    }
    public function delete(string $id): BusinessVerifications
    {
        // Implementasi logika untuk menghapus Business
        $businessVerifications = BusinessVerifications::findOrFail($id);
        $businessVerifications->delete();
        return $businessVerifications;
    }
}