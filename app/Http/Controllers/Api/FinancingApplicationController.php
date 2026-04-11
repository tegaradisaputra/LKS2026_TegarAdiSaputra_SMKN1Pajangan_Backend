<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreFinancingApplicationRequest;
use App\Http\Requests\UpdateFinancingApplicationRequest;
use App\Models\FinancingApplications;
use Illuminate\Routing\Controller;

class FinancingApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $data = FinancingApplications::orderBy('user_id', 'asc')->get();

            return response()->json([
                'status' => true,
                'message' => 'get all data success',
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
     * Store a newly created resource in storage.
     */
    public function store(StoreFinancingApplicationRequest $request)
    {
        //
        try {
            $data = FinancingApplications::create($request->validated());

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
    public function show(FinancingApplications $financingApplication)
    {
        //
        try {
            return response()->json([
                'status' => true,
                'message' => 'get detail data success',
                'data' => $financingApplication
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
    public function update(UpdateFinancingApplicationRequest $request, FinancingApplications $financingApplication)
    {
        //
        try {
            $financingApplication->update($request->validated());

            return response()->json([
                'status' => true,
                'message' => 'update data success',
                'data' => $financingApplication
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
    public function destroy(FinancingApplications $financingApplication)
    {
        //
        try {
            $financingApplication->delete();

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
