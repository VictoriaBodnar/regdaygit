<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Store the incoming blog post.
 *
 * @param  ValidSaveGraf  $request
 * @return Response
 */

class ValidSaveGraf extends FormRequest
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
            
        'kod_consumer' => 'required|numeric',  
        'date_zamer' => 'required|date',
        'type_zamer' => 'required|string',
        'a1' => 'required|int|min:0',
        'a2' => 'required|int|min:0',
        'a3' => 'required|int|min:0',
        'a4' => 'required|int|min:0',
        'a5' => 'required|int|min:0',
        'a6' => 'required|int|min:0',
        'a7' => 'required|int|min:0',
        'a8' => 'required|int|min:0',
        'a9' => 'required|int|min:0',
        'a10' => 'required|int|min:0',
        'a11' => 'required|int|min:0',
        'a12' => 'required|int|min:0',
        'a13' => 'required|int|min:0',
        'a14' => 'required|int|min:0',
        'a15' => 'required|int|min:0',
        'a16' => 'required|int|min:0',
        'a17' => 'required|int|min:0',
        'a18' => 'required|int|min:0',
        'a19' => 'required|int|min:0',
        'a20' => 'required|int|min:0',
        'a21' => 'required|int|min:0',
        'a22' => 'required|int|min:0',
        'a23' => 'required|int|min:0',
        'a24' => 'required|int|min:0',
        //'a_cyt' => 'required|int|min:0',
         
        ];
    }
}
