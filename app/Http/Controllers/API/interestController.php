<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\interestRequest;
use App\Models\interest;
use Illuminate\Http\Request;

class interestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $interest = interest::all();
        $response = [
            'status' => 200,
            'data' => $interest
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
    public function store(interestRequest $interestRequest)
    {
        //
        $interestRequest->validated();

        $interest = interest::create([
            'interest_Name' => $interestRequest->interest_Name
        ]);


        $response = [
            'status' => 200,
            'data' => $interest
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
    public function destroy(string $interestId)
    {
        //
        $role = interest::where('roleid', $interestId)->delete();

        $status = $role == 1 ? true : false;
        $data = [
            'status' => $status
        ];
        return response()->json($data);
    }
}
