<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'min:2'],
            'password' => ['required', 'string', 'min:2']
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.string'   => 'O e-mail deve ser um texto.',
            'email.email'    => 'Digite um e-mail válido.',
            'email.min'      => 'O e-mail deve ter pelo menos :min caracteres.',

            'password.required' => 'O campo senha é obrigatório.',
            'password.string'   => 'A senha deve ser um texto.',
            'password.min'      => 'A senha deve ter pelo menos :min caracteres.',
        ];
    }
}
