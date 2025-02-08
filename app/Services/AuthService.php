<?php

namespace App\Services;

use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Request;

class AuthService {
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository) {
        $this->authRepository = $authRepository;
    }

    public function login(array $credentials) {
        return $this->authRepository->login($credentials);
    }

    public function logout() {
        return $this->authRepository->logout();
    }
}
