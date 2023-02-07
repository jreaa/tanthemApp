<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubProcesoCostosRequest extends FormRequest
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
            'id_proceso_costos' => 'required|numeric',
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'colorFont' => 'required|string|max:255',
            'description' => 'nullable||string|max:255',
            'id_proyecto' => 'required|numeric'
        ];
    }
}
