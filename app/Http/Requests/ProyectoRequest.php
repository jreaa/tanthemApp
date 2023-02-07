<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|numeric',
            'description' => 'required|string|max:255',
            'estado' => 'nullable|numeric',
            'proyecto' => 'required|numeric',
            'costo' => 'nullable',
            'usersSelectedAll' => 'nullable|boolean',
            'costo_iva' => 'nullable',
            'ganancias' => 'nullable',
            'fecha_inicio' => 'nullable',
            'correo' => 'nullable',
            'telefono' => 'nullable',
            'direccion' => 'nullable'
        ];
    }
}
