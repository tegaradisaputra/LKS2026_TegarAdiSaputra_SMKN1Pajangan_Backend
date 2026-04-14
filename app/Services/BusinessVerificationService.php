i<?php

use App\Repositories\Contracts\BusinessVerificationRepositoryInterface;

class BusinessVerificationService
{
    protected $businessVerificationRepo;

    public function __construct(BusinessVerificationRepositoryInterface $businessVerificationRepo)
    {
        $this->businessVerificationRepo = $businessVerificationRepo;
    }

    public function getAll()
    {
        // Implementasi logika untuk mendapatkan semua Business
        return $this->businessVerificationRepo->all();
    }

    public function store(array $data)
    {
        // Implementasi logika untuk membuat Business baru
        return $this->businessVerificationRepo->create($data);
    }

    public function show(string $id)
    {
        // Implementasi logika untuk menampilkan detail Business
        return $this->businessVerificationRepo->findById($id);
    }

    public function approve(string $id, array $data)
    {
    // $data berisi status = verified/rejected + rejected_reason + verified_by + verified_at
    return $this->businessVerificationRepo->update($id, $data);
    }
}