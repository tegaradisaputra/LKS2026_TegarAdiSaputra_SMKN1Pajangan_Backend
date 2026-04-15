<?php

namespace App\Http\Controllers\Api;

use App\Models\FinancingApplications;
use App\Services\InstallmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class InstallmentsController extends Controller
{
    protected $installmentService;

    public function __construct(InstallmentService $installmentService)
    {
        return $this->installmentService = $installmentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(FinancingApplications $financingApplication): JsonResponse
    {
        //
        try {
            return response()->json([
                'status' => true,
                'message' => 'Get installments success',
                'data' => $this->installmentService->getFinancingApplication($financingApplication->id)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => true,
                'message' => $e->getMessage()
            ], 404);
        }
    }
}
