<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends FormRequest
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
            //
            'name'=>['bail','required','not_regex:/.+[0-9]/'],
            'description'=>['nullable','not_regex:/.+[0-9]/'],
            'permissions'=>['bail','array'],
            'permisisons.*'=>['integer']
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Bạn Phải Nhập Tên Vai Trò',
            'name.not_regex'=>'Tên Vai Trò Không Được Chứa Số',
            'description.not_regex'=>'Mô Tả Vai Trò Không Được Chứa Số',
            'permissions.required'=>'Bạn Phải Cung Cấp Quyền Cho Vai Trò',
            'permissions.array'=>'Có Lỗi Bất Ngờ Xảy Ra',
            'permissions.*.integer'=>'Có Lỗi Bất Ngờ Xảy Ra'
        ];
        # code...
    }
}
