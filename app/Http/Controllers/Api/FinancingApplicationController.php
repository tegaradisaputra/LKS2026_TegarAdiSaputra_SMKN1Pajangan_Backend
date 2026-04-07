<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreFinancingApplicationRequest;
use App\Http\Requests\UpdateFinancingApplicationRequest;
use App\Models\FinancingApplications;
use Error;
use Illuminate\Http\Request;

class FinancingApplicationController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $data = FinancingApplications::all();

            return response()->json([
                'status' => true,
                'data' => $data
            ], 200);
        } catch (\ErrorException $e) {
            return response()->json([
                'status' => false,
                'message' => throw new Error($e)
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFinancingApplicationRequest $storeFinancingApplication)
    {
        //
        try {
            $data = FinancingApplications::create($storeFinancingApplication);

            return response()->json([
                'status' => true,
                'data' => $data
            ], 200);
        } catch (\ErrorException $e) {
            return response()->json([
                'status' => false,
                'message' => throw new Error($e)
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FinancingApplications $financingApplications)
    {
        //
        try {
            $data = FinancingApplications::findOrFail();

            return response()->json([
                'status' => true,
                'data' => $data
            ], 200);
        } catch (\ErrorException $e) {
            return response()->json([
                'status' => false,
                'message' => throw new Error($e)
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFinancingApplicationRequest $updateFinancingApplication, FinancingApplications $financingApplications)
    {
        //
        try {
            $data = $financingApplications->update($updateFinancingApplication);

            return response()->json([
                'status' => true,
                'data' => $data
            ], 200);
        } catch (\ErrorException $e) {
            return response()->json([
                'status' => false,
                'message' => throw new Error($e)
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinancingApplications $financingApplications)
    {
        //
        try {
            $financingApplications->delete();

            return response()->json([
                'status' => true
            ], 200);
        } catch (\ErrorException $e) {
            return response()->json([
                'status' => false,
                'message' => throw new Error($e)
            ], 400);
        }
    }
}
