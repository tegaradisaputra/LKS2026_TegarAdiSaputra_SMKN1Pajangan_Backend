<?php

namespace App\Http\Controllers\Api;

use App\Models\FinancingApplications;
use App\Services\ApplicationLogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class ApplicationLogsController extends Controller
{
    protected $applicationLogService;

    public function __construct(ApplicationLogService $applicationLogService)
    {
        $this->applicationLogService = $applicationLogService;
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
                'message' => 'Get application logs success',
                'data' => $this->applicationLogService->getFinancingApplication($financingApplication->id)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
