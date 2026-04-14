<?php

namespace App\Services;

use App\Repositories\Contracts\InstallmentRepositoryInterface;


class InstallmentService
{
    protected $installmentRepo;

    public function __construct(InstallmentRepositoryInterface $installmentRepo)
    {
        $this->installmentRepo = $installmentRepo;
    }

    public function getFinancingApplication(string $financingApplicationId)
    {
        return $this->installmentRepo->getFinancingApplication($financingApplicationId);
    }

    public function generete(string $financingApplicationId, float $pokok, int $tenor)
    {
        // Rumus dari soal:
        // Total = Pokok + (Pokok × 6% × tenor/12)
        // Cicilan per bulan = Total / tenor
        $bunga = $pokok * 0.06 * ($tenor / 12);
        $total = $pokok + $bunga;
        $cicilanPerBulan = $total / $tenor;

        for ($i = 1; i <= $tenor; $i++){
            $this->installmentRepo->create([
                'financing_application_id' => $financingApplicationId,
                'installment_number' => $i,
                'jatuh_tempo' => now()->addDays(30 * $i),
                'nominal_pokok' => $pokok / $tenor,
                'nominal_bunga' => $bunga / $tenor,
                'total_cicilan' => $cicilanPerBulan,
                'status' => 'unpaid'
            ]);
        }
    }
}