<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatusNRequest extends FormRequest
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
            'table' => 'requiered',
            'n1' => '',
            'n2' => '',
            'n3' => '',
            'n4' => '',
            'n1Value' => '',
            'n2Value' => '',
            'n3Value' => '',
            'n4Value' => '',
        ];
    }
}
