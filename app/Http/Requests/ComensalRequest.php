<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ComensalRequest extends Request
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
           'nombre' => 'required|Alphaspace|min:3|max:50',
           'apellido' => 'required|Alphaspace|min:3|max:50',
           
           'ci' => 'required|Numeric',
           'carreras_id' => 'required',
           'procedencia' => 'required|Alphaspace|min:3|max:50',
           'numero' => 'required|Numeric|min:1|max:1000|Unique:comensal',
           'genero' => 'required',
        ];
    }
}
