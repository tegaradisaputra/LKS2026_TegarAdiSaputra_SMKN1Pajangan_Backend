<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
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
            $data = User::all()->groupBy('id', 'asc');

            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);

        } catch (\ErrorException $e) {
            return response()->json([
                'status' => false,
                'message' => throw new Error($e)
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $storeUserRequest)
    {
        //
        try {
            $data = User::create($storeUserRequest);    

            return response()->json([
                'status' => true,
                'data' => $data,
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
    public function show(User $user)
    {
        //
        try {
            $data = User::findOrFail($user);

            return response()->json([
                'status' => true,
                'data' => $data,
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
    public function update(UpdateUserRequest $updateUserRequest, User $user)
    {
        //
        try {
            $data = $user->update($updateUserRequest);

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
    public function destroy(User $user)
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
