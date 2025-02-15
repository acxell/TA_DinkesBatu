<?php

namespace App\Services;

use App\Models\Role;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function createUser(array $data)
    {
        $user = $this->userRepository->createUser($data);

        if (isset($data['roles'])) {
            $role = Role::where('name', $data['roles'])->first();
            if ($role) {
                $user->assignRole($role->name);
            }
        }

        return $user;
    }

    public function updateUser($id, array $data)
    {
        $user = $this->userRepository->updateUser($id, $data);

        if (isset($data['roles'])) {
            $user->syncRoles([$data['roles']]);
        }

        return $user->load('roles');
    }

    public function deleteUser($id)
    {
        return $this->userRepository->deleteUser($id);
    }
}
