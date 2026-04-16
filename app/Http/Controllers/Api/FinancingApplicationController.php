<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreFinancingApplicationRequest;
use App\Http\Requests\UpdateFinancingApplicationRequest;
use App\Models\FinancingApplications;
use App\Services\ApplicationLogService;
use App\Services\FinancingApplicationService;
use App\Services\InstallmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FinancingApplicationController extends Controller
{
    protected $financingApplicationService;
    protected $installmentService;
    protected $ApplicationLogService;

    public function __construct(
        FinancingApplicationService $financingApplicationService,
        InstallmentService $installmentService,
        ApplicationLogService $applicationLogService
    )
    {
        $this->financingApplicationService = $financingApplicationService;
        $this->installmentService = $installmentService;
        $this->ApplicationLogService = $applicationLogService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        //
        try {
            return response()->json([
                'status' => true,
                'message' => 'get all data success',
                'data' => $this->financingApplicationService->getAll()
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFinancingApplicationRequest $request): JsonResponse
    {
        //
        try {
            $data = array_merge($request->validated(), [
                'user_id' => auth()->id(),
                'submitted_at' => now(),
                'status' => 'submitted'
            ]);

            return response()->json([
                'status' => true,
                'message' => 'create data success',
                'data' => $this->financingApplicationService->store($data)
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        //
        try {
            return response()->json([
                'status' => true,
                'message' => 'get detail data success',
                'data' => $this->financingApplicationService->show($id)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function analyze(UpdateFinancingApplicationRequest $request, string $id): JsonResponse
    {
        try {
            $statusFrom = $this->financingApplicationService->show($id)->status;
            $data = array_merge($request->validated(), ['status' => 'under_review']);
            $updated = $this->financingApplicationService->analyze($id, $data);

            $this->ApplicationLogService->log(
                $id, $statusFrom, 'under_review', 'analyst', auth()->id(), $request->input('catatan_analisis')
            );

            return response()->json([
                'status' => true,
                'message' => 'analyze success',
                'data' => $updated
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function approve(UpdateFinancingApplicationRequest $request, string $id): JsonResponse
    {
        try {
            $application = $this->financingApplicationService->show($id);
            $statusFrom = $application->status;
            $updated = null;

            if($request->input('action') === 'approve'){
                $data = [
                    'status' => 'approved',
                    'approved_at' => now()
                ];

                $updated = $this->financingApplicationService->approve($id, $data);

                // Create installments automatically - using the correct misspelled method name
                try {
                    $this->installmentService->generete(
                        $id,
                        $application->jumlah_pembiayaan,
                        $application->tenor_bulan
                    );
                } catch (\Exception $e) {
                    // Skip if installments can't be created
                }

                $this->ApplicationLogService->log(
                    $id,
                    $statusFrom,
                    'approved',
                    'manager',
                    auth()->id()
                );
            } else {
                $data = [
                    'status' => 'rejected_by_manager',
                    'rejected_reason' => $request->input('reason')
                ];

                $updated = $this->financingApplicationService->approve($id, $data);

                $this->ApplicationLogService->log(
                    $id,
                    $statusFrom,
                    'rejected_by_manager',
                    'manager',
                    auth()->id(),
                    $request->input('reason')
                );
            }

            return response()->json([
                'status' => true,
                'message' => 'approve success',
                'data' => $updated
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFinancingApplicationRequest $request, string $id): JsonResponse
    {
        //
        try {
            return response()->json([
                'status' => true,
                'message' => 'update data success',
                'data' => $this->financingApplicationService->update($id,$request->validated())
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        //
        try {
            $this->financingApplicationService->delete($id);

            return response()->json([
                'status' => true,
                'message' => 'delete data success'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
