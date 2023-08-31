<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Trainer;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            //'password' => bcrypt($validatedData['password']),
        ];

        if (! $token = JWTAuth::attempt($credentials)) {
            info('$credentials', $credentials);
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json(['token' => $token]);
    }

    public function register(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:trainers,email',
            'password' => 'required|min:6',
            'full_name' => 'required',
        ]);

        /*$trainer = Trainer::create([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'full_name' => $request->input('full_name'),
        ]);*/

        $trainer = Trainer::create([
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'full_name' => $validatedData['full_name'],
        ]);

        // Creating JWT-token and returning successfully response
        $token = JWTAuth::fromUser($trainer);

        return response()->json([
            'message' => 'Trainer registered successfully',
            'token' => $token,
        ], 201);
    }

}
