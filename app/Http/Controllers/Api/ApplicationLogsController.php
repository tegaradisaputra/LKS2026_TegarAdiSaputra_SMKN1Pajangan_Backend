<?php

namespace App\Http\Controllers\Api;

use App\Models\FinancingApplications;
use Illuminate\Routing\Controller;

class ApplicationLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FinancingApplications $financingApplication)
    {
        //
        try {
            $logs = $financingApplication->orderBy('created_at', 'desc')->get();
            return response()->json([
                'status' => true,
                'message' => 'Get application logs success',
                'data' => $logs
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
