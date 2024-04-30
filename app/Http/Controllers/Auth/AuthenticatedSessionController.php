<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        // $request->authenticate();

        $request->validated();

        if (Auth::attempt($request->only('email', 'password'))) {
            return $this->error('', 'Credentials do not match', 401);

        }

        // $request->session()->regenerate();
        $user = User::where('email', $request->email)->first();

        $data = [
            'status' => true,
            'message' => 'successfully login',
            'user' => $user,
            'token' => $user->createToken('Api token of ' . $user->username)->plainTextToken
        ];

        return response()->json($data);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::User()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'user has logout'
        ]);
    }
}
