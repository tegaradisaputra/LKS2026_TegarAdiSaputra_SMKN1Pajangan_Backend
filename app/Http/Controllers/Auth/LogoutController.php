<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class LogoutController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }
}
