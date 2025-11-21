<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'document' => 'required|string|exists:users,document|max:20',//este valida que sea unico
            'password' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'document.required' => 'El documento es obligatorio.',
            'document.exists' => 'El documento no existe.',
            'password.required' => 'El documento es obligatorio.'
        ];
    }
    public function attributes()
    {
        return [
            'document' => 'documento',
            'password' => 'contraseña',
    ];
    }
}
