<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\chatRequest;
use App\Models\chat;
use Illuminate\Http\Request;

class chatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $chat = chat::all();
        $response = [
            'status' => 200,
            'data' => $chat
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
    public function store(chatRequest $chatRequest)
    {
        //

        $chatRequest->validated();

        $chat = chat::create([
            'rolename' => $chatRequest->message,
            'UMId' => $chatRequest->UMId
        ]);


        $response = [
            'status' => 200,
            'data' => $chat
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
    public function update(chatRequest $chatRequest, string $chatRequestId)
    {
        //

        $req = $chatRequest->validated();

        $role = chat::where('id', $chatRequestId)->update($req);
        $status = $role == 1 ? true : false;
        $data = [
            'status' => $status
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $chatRequestId)
    {
        //

        $role = chat::where('id', $chatRequestId)->delete();
        $status = $role == 1 ? true : false;
        $data = [
            'status' => $status
        ];

        return response()->json($data);
    }
}
