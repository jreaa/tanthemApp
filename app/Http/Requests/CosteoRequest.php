<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CosteoRequest extends FormRequest
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
            'description' => 'nullable|string|max:255',
            'date' => 'required|date',
            'status' => 'required|numeric',
            'value' => 'required|numeric',
            'id_proyecto' => 'required|numeric',
            'id_leaf' => 'required|numeric',
            'pendiente' => 'nullable|boolean'
        ];
    }
}
