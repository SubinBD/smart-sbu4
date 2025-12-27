<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Will implement proper authorization later
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'phone' => ['nullable', 'string', 'max:20'],
            'employee_id' => ['nullable', 'string', 'max:255', 'unique:users'],
            'position' => ['nullable', 'string', 'max:255'],
            'role' => ['required', 'string', 'in:admin,manager,user'],
            'division' => ['nullable', 'string', 'max:255'],
            'district' => ['nullable', 'string', 'max:255'],
            'upozila' => ['nullable', 'string', 'max:255'],
            'region' => ['nullable', 'string', 'max:255'],
            'nsm' => ['nullable', 'string', 'max:255'],
            'csm' => ['nullable', 'string', 'max:255'],
            'rsm' => ['nullable', 'string', 'max:255'],
            'asm' => ['nullable', 'string', 'max:255'],
            'tsm' => ['nullable', 'string', 'max:255'],
            'sr' => ['nullable', 'string', 'max:255'],
            'retailer' => ['nullable', 'string', 'max:255'],
            'distributor' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'], // Max 2MB, image file types
        ];
    }
}