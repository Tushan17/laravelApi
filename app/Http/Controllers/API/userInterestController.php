<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\userInterestRequest;
use App\Models\userInterest;
use Illuminate\Http\Request;

class userInterestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $userInterest = userInterest::all();
        $response = [
            'status' => 200,
            'data' => $userInterest
        ];
        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(userInterestRequest $userInterestRequest)
    {
        //
        $userInterestRequest->validated();

        $userInterest = userInterest::create([
            'userId' => $userInterestRequest->userId,
            'interestId' => $userInterestRequest->interestId
        ]);


        $response = [
            'status' => 200,
            'data' => $userInterest
        ];

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $userInterestId)
    {
        //
        $role = userInterest::where('userInterestId', $userInterestId)->delete();

        $status = $role == 1 ? true : false;
        $data = [
            'status' => $status
        ];
        return response()->json($data);
    }
}
