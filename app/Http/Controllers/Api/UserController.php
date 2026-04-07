<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Error;
use Illuminate\Http\Request;

class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $data = User::all();

            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);

        } catch (\Throwable $e) {
            dd(throw new Error($e));
            // return response()->json([
            //     'status' => false,
            //     'message' => throw new Error($e)
            // ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user)
    {
        //
        try {
            User::create();

            return response()->json([

            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        $data = User::findOrFail();

        return response()->json([

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
