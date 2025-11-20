<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'document' => 'required|string|max:20|unique:users,document',//este valida que sea unico
            'names' => 'required|string|max:255',
            'last_names' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'rol' => 'required|exists:roles,name',//este valida que el rol exista
            'ficha' => 'required|exists:fichas,name',//este valida que la ficha exista
        ];
    }

    public function messages()
    {
        return [
            'document.required' => 'El documento es obligatorio.',
            'document.unique' => 'El documento ya existe.',
            'names.required' => 'Los nombres es obligatorio.',
            'last_names.required' => 'Los apellidos es obligatorio.',
            'phone.required' => 'El telefono es obligatorio.',
            'email.required' => 'El correo electronico es obligatorio.',
            'rol.required' => 'El rol es obligatorio.',
            'rol.exists' => 'El rol debe existir',
            'ficha.required' => 'La ficha es obligatoria.',
            'ficha.exists' => 'La ficha debe existir',
        ];
    }
    public function attributes()
    {
        return [
            'document' => 'documento',
            'names' => 'nombres',
            'last_names' => 'apellidos',
            'phone' => 'teléfono',
            'email' => 'correo electrónico',
            'rol' => 'rol del usuario',
            'ficha' => 'ficha',
    ];
}
}
