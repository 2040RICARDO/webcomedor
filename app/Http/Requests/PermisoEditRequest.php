<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PermisoEditRequest extends Request
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
            
            'fecha_final' => 'required|date',
            'motivo' => 'required|Alphaspace|max:50|min:3',
        ];
    }
}
