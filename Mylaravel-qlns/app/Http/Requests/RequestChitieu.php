<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestChitieu extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [


            'tenchitieu'=>'required',
            'mota' => 'required'
        ];

    }
    public function messages()
    {
        return [

            'tenchitieu.required' =>'Không được để trống',
            'mota.required' =>'Không được để trống'
        ];
    }
}
