<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreInstallmentRequest;
use App\Http\Requests\UpdateInstallmentRequest;
use App\Models\Installments;
use Error;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class InstallmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $data = Installments::orderBy('installment_number', 'asc')->get();

            return response()->json([
                'status' => true,
                'message' => 'get all data success',
                'data' => $data
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => true,
                'message' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstallmentRequest $request)
    {
        //
        try {
            $data = Installments::create($request->validated());

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
    public function show(Installments $installment)
    {
        //
        try {
            return response()->json([
                'status' => true,
                'message' => 'get detail data success',
                'data' => $installment
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
    public function update(UpdateInstallmentRequest $request, Installments $installment)
    {
        //
        try {
            $installment->update($request->validated());

            return response()->json([
                'status' => true,
                'message' => 'update data success',
                'data' => $installment
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Installments $installment)
    {
        //
        try {
            $installment->delete();

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
