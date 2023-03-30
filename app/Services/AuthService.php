<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\AuthRepository;

class AuthService
{

    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register($request): User
    {
        return $this->authRepository->register($request);
    }

    public function login($credentials): array
    {
        if (!$token = auth()->attempt($credentials)) {
            return ['error' => 'Invalid credentials'];
        }

        return $this->respondWithToken($token);
    }

    public function refreshToken(): array
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function logOut(): void
    {
        auth()->logout();
    }

    private function respondWithToken($token): array
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }
}