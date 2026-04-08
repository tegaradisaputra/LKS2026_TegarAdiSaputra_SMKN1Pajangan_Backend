<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreBusinessVerificationRequest;
use App\Http\Requests\UpdateBusinessVerificationRequest;
use App\Models\BusinessVerifications;
use Illuminate\Http\Request;
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
            $data = BusinessVerifications::groupBy('nama_usaha', 'asc')->get;

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
            ], 200);
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
    public function show(BusinessVerifications $businessVerifications)
    {
        //
        try {
            return response()->json([
                'status' => true,
                'message' => 'get detail data success',
                'data' => $businessVerifications
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
    public function update(UpdateBusinessVerificationRequest $request, BusinessVerifications $businessVerifications)
    {
        //
        try {
            $businessVerifications->update($request->validated);

            return response()->json([
                'status' => true,
                'message' => 'update data success',
                'data' => $businessVerifications
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
    public function destroy(BusinessVerifications $businessVerifications)
    {
        //
        try {
            $businessVerifications->delete();

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
