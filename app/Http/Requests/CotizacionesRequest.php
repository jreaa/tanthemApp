<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CotizacionesRequest extends FormRequest
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
            'id_body' => 'nullable|numeric',
            'description'  => 'required|string|max:255',
            'fecha'  => 'nullable|string|max:255',
            'n_interno' => 'required|numeric',
            'id_cliente'  => 'required|numeric',
            'id_contacto'  => 'required|numeric',
            'id_estado'  => 'required|numeric',
            'monto'  => 'required|string|max:255',
            'correo' => 'nullable|string|max:255',
            'responsable' => 'required|string|max:255',
            'unidad' => 'required|string|max:255'
        ];
    }
}
