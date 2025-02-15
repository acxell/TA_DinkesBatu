<?php

namespace App\Http\Requests\AuthRequest;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest {
    public function rules(): array {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required',
        ];
    }
}
