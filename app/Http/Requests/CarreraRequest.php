<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CarreraRequest extends Request
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
            'universidad' => 'required|min:3',
           'area' => 'required|Alphaspace|min:3',
           'carrera' => 'required|min:3',
        ];
    }
}
