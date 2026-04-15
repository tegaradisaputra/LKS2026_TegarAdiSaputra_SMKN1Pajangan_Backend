<?php

namespace App\Services;

use App\Repositories\Contracts\ApplicationLogRepositoryInterface;

class ApplicationLogService
{
    protected $applicationLogRepo;

    public function __construct(ApplicationLogRepositoryInterface $applicationLogRepo)
    {
        $this->applicationLogRepo = $applicationLogRepo;
    }

    public function getFinancingApplication(string $financingApplicationId)
    {
        return $this->applicationLogRepo->getFinancingApplication($financingApplicationId);
    }

    public function log(string $financingApplicationId, string $statusFrom, string $statusTo, string $role, string $userId, ?string $notes = null)
    {
        return $this->applicationLogRepo->create([
            'financing_application_id' => $financingApplicationId,
            'status_from'              => $statusFrom,
            'status_to'                => $statusTo,
            'role'                     => $role,
            'user_id'                  => $userId,
            'notes'                    => $notes,
        ]);
    }
}