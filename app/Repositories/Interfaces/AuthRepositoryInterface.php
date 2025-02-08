<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Support\Facades\Request;

interface AuthRepositoryInterface
{
    public function login(array $credentials);
    public function logout();
};