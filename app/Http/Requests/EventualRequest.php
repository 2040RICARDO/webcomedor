<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Http\Requests\EventualRequest;
class EventualRequest extends Request
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
            'nombre' => 'required|Alphaspace|min:3|max:30',
           'apellido' => 'required|Alphaspace|min:3|max:30',
           
           'ci' => 'required|Numeric',
           'carreras_id' => 'required',
           'procedencia' => 'required|Alphaspace|min:3|max:30',
           'numero' => 'required|Numeric|min:1|max:1000',
           'genero' => 'required',
           'fecha_inicio' => 'required|date',
           'fecha_final' => 'required|date',
        ];
    }
}
