<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller {
    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function index() {
        return view('users.index', ['users' => $this->userService->getAllUsers()]);
    }

    public function store(StoreUserRequest $request): JsonResponse {
        $user = $this->userService->createUser($request->validated());
        return response()->json($user);
    }

    public function update(UpdateUserRequest $request, $id): JsonResponse {
        $user = $this->userService->updateUser($id, $request->validated());
        return response()->json($user);
    }

    public function destroy($id): JsonResponse {
        $this->userService->deleteUser($id);
        return response()->json(['message' => 'User deleted successfully']);
    }
}

