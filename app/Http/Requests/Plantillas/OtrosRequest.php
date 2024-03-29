<?php

namespace App\Http\Requests\Plantillas;

use Illuminate\Foundation\Http\FormRequest;

class OtrosRequest extends FormRequest
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
            'name' => 'required',
            'id_proyecto' => 'required',
            'description' => 'required',
            'fecha' => 'required',
            'precio_costo' => 'required'
        ];
    }
}
