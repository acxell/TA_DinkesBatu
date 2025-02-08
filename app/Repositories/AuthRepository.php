<?php

namespace App\Repositories;

use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface {
    public function login(array $credentials): array 
    {
        return $credentials;
    }

    public function logout(): void 
    {
        Auth::logout();
    }
}
