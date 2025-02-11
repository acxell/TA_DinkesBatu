<?php

namespace App\Http\Requests\RoleRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest {
    public function rules(): array {
        return [
            'name' => 'required|string|max:255' . $this->route('id'),
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'guard_name' => 'web'
        ]);
    }
}