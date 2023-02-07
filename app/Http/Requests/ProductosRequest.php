<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosRequest extends FormRequest
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
            'cod' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'precio'  => 'required|string',
            'stock' => 'required|numeric',
            'uf' => 'required|string',
            'comentarios' => 'nullable|string|max:500',
            'tipo' => 'required|numeric'
        ];
    }
}
