<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
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
            "id_usuario" => "required",
            "servicios" => "required",
            "carac" => "required",
            "costo" => "required",
            "pv" => "required",
            "tipo" => "required",
            "n1" => "",
            "n2" => "",
            "n3" => "",
            "n4" => "",
        ];
    }
}
