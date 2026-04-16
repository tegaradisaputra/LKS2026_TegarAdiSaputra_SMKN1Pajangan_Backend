<?php

namespace App\Services;

use App\Repositories\Contracts\FinancingApplicationRepositoryInterface;

class FinancingApplicationService
{
    protected $financingApplicationRepo;

    public function __construct(FinancingApplicationRepositoryInterface $financingApplicationRepo)
    {
        $this->financingApplicationRepo = $financingApplicationRepo;
    }

    public function getAll()
    {
        return $this->financingApplicationRepo->all();
    }

    public function store(array $data)
    {
        return $this->financingApplicationRepo->create($data);
    }

    public function show(string $id)
    {
        return $this->financingApplicationRepo->findById($id);
    }

    public function analyze(string $id, array $data)
    {
        return $this->financingApplicationRepo->update($id, $data);
    }

    public function approve(string $id, array $data)
    {
        return $this->financingApplicationRepo->update($id, $data);
    }
}