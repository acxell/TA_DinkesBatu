<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\UserRequest\StoreUserRequest;
use App\Http\Requests\UserRequest\UpdateUserRequest;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('users.index', ['users' => $this->userService->getAllUsers()]);
    }

    public function store(StoreUserRequest $request)
    {
        $this->userService->createUser($request->validated());
        return redirect()->back()->with('success', 'User Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->back()->with('success', 'User Berhasil Dihapus');
    }


    public function update(UpdateUserRequest $request, $id)
    {
        $this->userService->updateUser($id, $request->validated());
        return redirect()->back()->with('success', 'Data User Berhasil Diubah');
    }
}
