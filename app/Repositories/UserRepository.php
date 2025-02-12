<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {
    public function getAllUsers() {
        return User::all();
    }

    public function getUserById($id) {
        return User::findOrFail($id);
    }

    public function createUser(array $data) {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }

    public function updateUser($id, array $data) {
        $user = User::findOrFail($id);

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $user->update($data);
        return $user->fresh();
    }

    public function deleteUser($id) {
        return User::destroy($id);
    }
}
