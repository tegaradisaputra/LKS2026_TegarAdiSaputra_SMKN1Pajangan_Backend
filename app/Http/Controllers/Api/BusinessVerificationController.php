<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreBusinessVerificationRequest;
use App\Http\Requests\UpdateBusinessVerificationRequest;
use App\Models\BusinessVerifications;
use Illuminate\Routing\Controller;

class BusinessVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $data = BusinessVerifications::orderBy('nama_usaha', 'asc')->get();

            return response()->json([
                'status' => true,
                'message' => 'get all data success',
                'data' => $data
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
            $data = BusinessVerifications::create($request->validated());

            return response()->json([
                'status' => true,
                'message' => 'create data success',
                'data' => $data
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
    public function show(BusinessVerifications $businessVerification)
    {
        //
        try {
            return response()->json([
                'status' => true,
                'message' => 'get detail data success',
                'data' => $businessVerification
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
    public function update(UpdateBusinessVerificationRequest $request, BusinessVerifications $businessVerification)
    {
        //
        try {
            $businessVerification->update($request->validated());

            return response()->json([
                'status' => true,
                'message' => 'update data success',
                'data' => $businessVerification
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
    public function destroy(BusinessVerifications $businessVerification)
    {
        //
        try {
            $businessVerification->delete();

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
