<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeguimientoCotizacionRequest extends FormRequest
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
            'comment' => 'nullable|string|max:255',
            'contact' => 'nullable|numeric',
            'date' => 'nullable|string|max:255',
            'action' => 'nullable|numeric',
            'cotizacion_id' => 'required|numeric',
            'prox_agendamiento' => 'required|boolean'
        ];
    }
}
