<?php

namespace App\Repositories;

use App\Models\FinancingApplications;
use App\Repositories\Contracts\FinancingApplicationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class FinancingApplicationRepository implements FinancingApplicationRepositoryInterface
{
    public function all(): Collection
    {
        // Implementasi logika untuk mendapatkan semua Financing
        return FinancingApplications::orderBy('created_at', 'desc')->get();
    }
    public function findById(string $id): ?FinancingApplications
    {
        return FinancingApplications::find($id);
    }
    public function create(array $data): FinancingApplications
    {
        // Implementasi logika untuk membuat Financing baru
        return FinancingApplications::create($data);
    }
    public function update(string $id, array $data): FinancingApplications
    {
        // Implementasi logika untuk memperbarui Financing
        $financingApplication = FinancingApplications::findOrFail($id);
        $financingApplication->update($data);
        return $financingApplication;
    }
    public function delete(string $id): FinancingApplications
    {
        // Implementasi logika untuk menghapus Financing
        $financingApplication = FinancingApplications::findOrFail($id);
        $financingApplication->delete();
        return $financingApplication;
    }
}