<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateProjectRequest extends FormRequest
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
            'category' => 'integer|required',
            'technology' => 'integer|required',
            'theme' => 'integer|required',
            'difficulty' => 'integer|required',
            'comments' => 'max:75|string|required',
        ];
    }

    public function messages(): array
    {
        return [
            'category.integer' => 'Categoría no válida',
            'category.required' => 'Categoría es requerida',
            'technology.integer' => 'Tecnología no válida',
            'technology.required' => 'Tecnología es requerida',
            'theme.integer' => 'Tema no válido',
            'theme.required' => 'Tema es requerido',
            'difficulty.integer' => 'Dificultad no válida',
            'difficulty.required' => 'Dificultad es requerida',
            'comments.max' => 'Comentarios adicionales no pueden exceder los 75 caracteres',
        ];
    }
}
