<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreAplicationLogsRequest;
use App\Http\Requests\UpdateAplicationLogsRequest;
use App\Models\ApplicationLogs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApplicationLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $data = ApplicationLogs::orderBy('financing_application_id', 'asc')->get();

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
    public function store(StoreAplicationLogsRequest $request)
    {
        //
        try {
            $data = ApplicationLogs::create($request->validated());

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
    public function show(ApplicationLogs $applicationLog)
    {
        //
        try {
            return response()->json([
                'status' => true,
                'message' => 'get detail data success',
                'data' => $applicationLog
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
    public function update(UpdateAplicationLogsRequest $request, ApplicationLogs $applicationLog)
    {
        //
        try {
            $applicationLog->update($request->validated());

            return response()->json([
                'status' => true,
                'message' => 'update data success',
                'data' => $applicationLog
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
    public function destroy(ApplicationLogs $applicationLog)
    {
        //
        try {
            $applicationLog->delete();

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
