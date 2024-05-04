<?php

namespace App\Http\Controllers;

use App\Http\Requests\roleRequest;
use App\Http\Resources\roleResource;
use App\Models\role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = role::all();

        $response = roleResource::collection($data);

        return $response;
        // return 'helo';
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
    public function store(roleRequest $roleRequest)
    {
        //
        $roleRequest->validated();

        $role = role::create([
            'rolename' => $roleRequest->rolename
        ]);

        $data = roleResource::collection([$role]);

        $response = [
            'status' => 200,
            'data' => $data
        ];

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $roleid)
    {
        //
        $role = role::select()->where('roleid', $roleid)->get();

        $data = roleResource::collection($role);

        $response = [
            'status' => 200,
            'data' => $data
        ];

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(roleRequest $roleRequest, string $roleid)
    {
        //
        $req = $roleRequest->validated();

        $role = role::where('roleid', $roleid)->update($req);
        $status = $role == 1 ? true : false;
        $data = [
            'status' => $status
        ];

        return response()->json($data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $roleid)
    {
        //
        $role = role::where('roleid', $roleid)->delete();

        $status = $role == 1 ? true : false;
        $data = [
            'status' => $status
        ];
        return response()->json($data);
    }
}
