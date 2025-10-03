<?php

namespace App\Http\Requests\Task;

use App\TaskStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:2'],
            'description' => ['required', 'string', 'min:8'],
            'status' => ['required', 'string', Rule::enum(TaskStatusEnum::class)],
            'completed_at' => ['nullable', 'date'],
        ];
    }
    
    public function messages(): array
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'title.string'   => 'O título deve ser um texto.',
            'title.min'      => 'O título deve ter pelo menos :min caracteres.',

            'description.required' => 'A descrição é obrigatória.',
            'description.string'   => 'A descrição deve ser um texto.',
            'description.min'      => 'A descrição deve ter pelo menos :min caracteres.',

            'status.required' => 'O status é obrigatório.',
            'status.string'   => 'O status deve ser um texto.',
            'status'     => 'O status informado é inválido.',

            'completed_at.date' => 'O campo "concluído em" deve ser uma data válida.',
        ];
    }
}
