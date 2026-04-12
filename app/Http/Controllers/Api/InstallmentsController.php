<?php

namespace App\Http\Controllers\Api;

use App\Models\FinancingApplications;
use Illuminate\Routing\Controller;

class InstallmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FinancingApplications $financingApplication)
    {
        //
        try {
            $instalments = $financingApplication->installments()->orderBy('installment_number', 'asc')->get();
            return response()->json([
                'status' => true,
                'message' => 'Get installments success',
                'data' => $instalments
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => true,
                'message' => $e->getMessage()
            ], 404);
        }
    }
}
