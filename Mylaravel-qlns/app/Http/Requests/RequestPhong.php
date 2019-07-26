<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPhong extends FormRequest
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
            'tenphong'=>'required|unique:phongban,ten_phong,'.$this->id,
            'mota' => 'required'
        ];
    }
    public function messages()
    {
        return [
          'tenphong.required' =>'Không được để trống',
            'tenphong.unique' =>'Tên phòng đã tồn tại',
            'mota.required' =>'Không được để trống'
        ];
    }
}
