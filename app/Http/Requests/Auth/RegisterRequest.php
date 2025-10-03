<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'string', 'email', 'min:2', 'unique:users,email'],
            'password' => ['required', 'string', 'min:2'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string'   => 'O nome deve ser um texto.',
            'name.min'      => 'O nome deve ter pelo menos :min caracteres.',

            'email.required' => 'O campo e-mail é obrigatório.',
            'email.string'   => 'O e-mail deve ser um texto.',
            'email.email'    => 'Digite um e-mail válido.',
            'email.min'      => 'O e-mail deve ter pelo menos :min caracteres.',
            'email.unique'   => 'Este e-mail já foi cadastrado no sistema.',

            'password.required' => 'O campo senha é obrigatório.',
            'password.string'   => 'A senha deve ser um texto.',
            'password.min'      => 'A senha deve ter pelo menos :min caracteres.',
        ];
    }
}
