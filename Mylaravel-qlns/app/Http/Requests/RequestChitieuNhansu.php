<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestChitieuNhansu extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idchitieu',
            'idnhansu',
            'diemchitieu'=>'required',
            'diemdatduoc',
            'thang',
            'nam'
        ];
    }
    public function messages()
    {
        return [

            'diemchitieu.required' =>'Không được để trống'
        ];
    }
}
