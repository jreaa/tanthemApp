<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateClienteRequest extends FormRequest
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
            'name'  => '',
            'estado'  => '',
            'rut'   => '',
            'email'  => '',
            'primary_phone'  => '',
            'pais' => '',
            'secondary_phone'  => '',
            'category'         => '',
            'website'          => '',
            'address'          => '',
            'contact_name'     => '',
            'type'             => '',
            'region_id'       => '',
            'comuna_id'       => '',
            'rut_cliente'     => ''
        ];
    }
}
