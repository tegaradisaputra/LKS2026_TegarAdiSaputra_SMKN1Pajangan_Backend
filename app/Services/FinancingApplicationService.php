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

    public function analyze(string $id, array $data)
    {
        // $data berisi skor_kelayakan, rekomendasi_limit, catatan_analisis, status
        return $this->businessVerificationRepo->update($id, $data);
    }

    public function approve(string $id, array $data)
    {
        // $data berisi status = approved/rejected_by_manager + rejected_reason + approved_at
        return $this->businessVerificationRepo->update($id, $data);
    }
}