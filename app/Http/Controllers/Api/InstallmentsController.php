<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreInstallmentRequest;
use App\Http\Requests\UpdateInstallmentRequest;
use App\Models\Installments;
use Error;
use Illuminate\Http\Request;

class InstallmentsController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $data = Installments::all()->groupBy('installment_number', 'asc');

            return response()->json([
                'status' => true,
                'data' => $data
            ], 200);
        } catch (\ErrorException $e) {
            return response()->json([
                'status' => true,
                'message' => throw new Error($e)
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstallmentRequest $storeInstallment, )
    {
        //
        try {
            $data = Installments::create($storeInstallment);

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
    public function show(Installments $installments)
    {
        //
        try {
            $data = Installments::findOrFail($installments);
            
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
    public function update(UpdateInstallmentRequest $updateInstallment, Installments $installments)
    {
        //
        try {
            $data = $installments->update($UpdateInstallmentRequest);

            return response()->json([
                'status' => true,
                'data' => $data
            ], 200);
        } catch (\ErrorException $e) {
            return response()->json([
                'status' => 400,
                'message' => throw new Error($e)
            ])
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Installments $installments)
    {
        //
        try {
            $user->delete();

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
