<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'name'  => 'nullable|string|max:255',
            'estado'  => 'nullable|numeric',
            'rut'   => 'nullable|string|max:255',
            'email'  => 'nullable|string|max:255',
            'primary_phone'  => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',
            'secondary_phone'  => 'nullable|string|max:255',
            'category'         => 'nullable|string|max:255',
            'website'          => 'nullable|string|max:255',
            'address'          => 'nullable|string|max:255',
            'contact_name'     => 'nullable|string|max:255',
            'type'             => 'nullable|string|max:255',
            'region_id'       => 'nullable|numeric',
            'comuna_id'       => 'nullable|string|max:255',
            'rut_cliente'     => 'nullable|string|max:255',
            'email2'          => 'nullable|string|max:255',
            'comentarios'     => 'nullable|string|max:255',
            'rubro_id'        => 'nullable|numeric',
            'contactos'       => 'nullable|array'
        ];
    }
}
