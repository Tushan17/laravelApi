<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\userCategoryRequest;
use App\Models\usercategory;
use Illuminate\Http\Request;

class userCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $userCategory = usercategory::all();
        $response = [
            'status' => 200,
            'data' => $userCategory
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
    public function store(userCategoryRequest $userCategoryRequest)
    {
        //
        $userCategoryRequest->validated();

        $userCategory = usercategory::create([
            'categoryId' => $userCategoryRequest->rolename,
            'userId' => $userCategoryRequest->rolename
        ]);


        $response = [
            'status' => 200,
            'data' => $userCategory
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
    public function update(userCategoryRequest $userCategoryRequest, string $id)
    {
        //
        $req = $userCategoryRequest->validated();

        $role = usercategory::where('id', $id)->update($req);
        $status = $role == 1 ? true : false;
        $data = [
            'status' => $status
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $role = usercategory::where('id', $id)->delete();

        $status = $role == 1 ? true : false;
        $data = [
            'status' => $status
        ];
        return response()->json($data);
    }
}
