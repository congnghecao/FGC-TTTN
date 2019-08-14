<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPhongNhatKy extends FormRequest
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
            'lamviec_id',
            'idphongban',
            'idnhansu',
            'idvitri',
            'ngayketthuc',
            'ghichu' => 'required'
        ];
    }
    public function messages()
    {
        return [

            'ghichu.required' =>'Không được để trống'
        ];
    }
}
