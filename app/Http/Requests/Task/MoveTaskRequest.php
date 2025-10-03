<?php

namespace App\Http\Requests\Task;

use App\TaskStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MoveTaskRequest extends FormRequest
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
            'order' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'string', Rule::enum(TaskStatusEnum::class)],
        ];
    }
    
    public function messages(): array
    {
        return [
            'status.required'   => 'O status é obrigatoria.',
            'status.string'   => 'O status deve ser um texto.',
            'status.enum'     => 'O status informado é inválido.',

            'order.required'   => 'A ordem é obrigatoria.',
            'order.integer'   => 'A ordem deve ser um número.',
            'order.min'      => 'A ordem deve ser no mínimo :min.',
        ];
    }
}
