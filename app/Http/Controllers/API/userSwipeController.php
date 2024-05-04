<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\userSwipesRequest;
use App\Models\user_Swipe;
use App\Models\userSwipe;
use Illuminate\Http\Request;

class userSwipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $userSwipes = userSwipe::all();
        $response = [
            'status' => 200,
            'data' => $userSwipes
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
    public function store(userSwipesRequest $userSwipeRequest)
    {
        //
        $userSwipeRequest->validated();

        $userMatched = userSwipe::where('onuser', $userSwipeRequest->userswipes)->get();

        // return response()->json($userMatched);

        $userSwipe = userswipe::create([
            'userswipes' => $userSwipeRequest->userswipes,
            'onuser' => $userSwipeRequest->onuser,
            'swipesId' => $userSwipeRequest->swipesId
        ]);

        $response = [
            'status' => 200,
            'data' => $userSwipe
        ];

        return response()->json($response);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $userSwipeId)
    {
        //
        $userSwipe = userswipe::select()->where('userSwipeId', $userSwipeId)->get();


        $response = [
            'status' => 200,
            'data' => $userSwipe
        ];

        return response()->json($response);
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
    public function update(userSwipesRequest $userSwipesRequest, string $userSwipeid)
    {
        //

        $req = $userSwipesRequest->validated();

        $role = userSwipe::where('userSwipeId', $userSwipeid)->update($req);
        $status = $role == 1 ? true : false;
        $data = [
            'status' => $status
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $userSwipeid)
    {
        //
        $role = userSwipe::where('userSwipeId', $userSwipeid)->delete();

        $status = $role == 1 ? true : false;
        $data = [
            'status' => $status
        ];
        return response()->json($data);
    }
}
