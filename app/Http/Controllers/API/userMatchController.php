<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\userMatchRequest;
use App\Models\usermatch;
use Illuminate\Http\Request;

class userMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $userMatch = usermatch::all();
        $response = [
            'status' => 200,
            'data' => $userMatch
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
    public function store(userMatchRequest $userMatchRequest)
    {
        //
        $userMatchRequest->validated();

        $userMatch = usermatch::create([
            'user1' => $userMatchRequest->user1,
            'user2' => $userMatchRequest->user2

        ]);

        $response = [
            'status' => 200,
            'data' => $userMatch
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
    public function destroy(string $userMatchId)
    {
        //
        $role = usermatch::where('userMatchId', $userMatchId)->delete();

        $status = $role == 1 ? true : false;
        $data = [
            'status' => $status
        ];
        return response()->json($data);
    }
}
