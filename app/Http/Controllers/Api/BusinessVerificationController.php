<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreBusinessVerificationRequest;
use App\Http\Requests\UpdateBusinessVerificationRequest;
use App\Models\BusinessVerifications;
use App\Services\BusinessVerificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Request;

class BusinessVerificationController extends Controller
{
    protected $businessVerificationService;

    public function __construct(BusinessVerificationService $businessVerificationService)
    {
        $this->businessVerificationService = $businessVerificationService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            return response()->json([
                'status' => true,
                'message' => 'get all data success',
                'data' => $this->businessVerificationService->getAll()
            ], 200);
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
    public function store(StoreBusinessVerificationRequest $request)
    {
        //
        try {
            return response()->json([
                'status' => true,
                'message' => 'create data success',
                'data' => $this->businessVerificationService->store($request->validated())
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
    public function show(string $id)
    {
        //
        try {
            return response()->json([
                'status' => true,
                'message' => 'get detail data success',
                'data' => $this->businessVerificationService->show($id)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function approve(Request $request, string $id): JsonResponse
    {
        try {
            $data = $request->input('reason')
                ? [
                    'status' => 'rejected',
                    'rejected_reason' => $request->input('reason')
                ]
                : [
                    'status' => 'verified',
                    'verified_by' => auth()->id(),
                    'verified_at' => now()
                ];
    
                return response()->json([
                    'status' => true,
                    'message' => 'business verification updated success',
                    'data' => $this->businessVerificationService->approve($id, $data)
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
    public function update(UpdateBusinessVerificationRequest $request, string $id): JsonResponse
    {
        //
        try {
            return response()->json([
                'status' => true,
                'message' => 'update data success',
                'data' => $this->businessVerificationService->update($id, $request->validated())
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
    public function destroy(BusinessVerifications $id)
    {
        //
        try {
            $this->businessVerificationService->delete($id);

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
