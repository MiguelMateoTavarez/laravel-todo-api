<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->middleware('auth:api', ['except' => ['register']]);
        $this->authService = $authService;
    }

    public function login(): JsonResponse
    {
        $credentials = request(['email', 'password']);

        $response = $this->authService->login($credentials);

        return response()->json($response, isset($response['error']) ? 401 : 200);
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        return response()->json([
            'message' => 'Register successfully',
            'user' => $this->authService->register($request)
        ], 201);
    }


    public function me(): JsonResponse
    {
        return response()->json(auth()->user());
    }

    public function logout(): JsonResponse
    {
        $this->authService->logOut();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh(): JsonResponse
    {
        return response()->json($this->authService->refreshToken());
    }
}