<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user.name' => ['required', 'string', 'max:255'],
            'user.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->user_id],
            'user.role_id' => ['required', 'exists:roles,id'],
            'address.city' => ['required', 'string', 'max:255'],
            'address.postal_code' => ['required', 'string', 'max:255'],
            'address.neighborhood' => ['required', 'string', 'max:255'],
        ];
    }

    public function attributes()
    {
        return [
            'user.name' => 'nome',
            'user.email' => 'e-mail',
            'user.password' => 'senha',
            'user.password_confirmation' => 'confirmação de senha',
            'address.city' => 'cidade',
            'address.postal_code' => 'CEP',
            'address.neighborhood' => 'bairro',
        ];
    }
}
