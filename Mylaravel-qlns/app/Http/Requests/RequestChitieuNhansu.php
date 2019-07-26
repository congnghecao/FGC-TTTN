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
            'thang'=>'required',
            'nam'=>'required',
            'ketqua',
            'khenthuong',
            'canhbao'
        ];
    }
    public function messages()
    {
        return [

            'diemchitieu.required' =>'Không được để trống',
            'thang.required' =>'Không được để trống',
            'nam.required' =>'Không được để trống'
        ];
    }
}
