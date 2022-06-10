<?php

namespace App\Http\Requests\Admin;

use App\Helper\Common;
use App\Rules\RuleUppercase;
use App\Rules\RuleCapitalize;
use Illuminate\Foundation\Http\FormRequest;

class PermissionsRequest extends FormRequest
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
        if(isset($this->route()->parameters['permission'])){
            $permissionId = $this->route()->parameters['permission'];
            $permissionId = Common::changeIdToDecode($permissionId)->getId();
        }
        return [
            'name'=>['bail','required','not_regex:/.+[0-9]/','unique:permissions,name,'.(isset($permissionId) ? $permissionId : '' )],
            'description'=>['nullable','not_regex:/.+[0-9]/'],
            'permission'=>['bail','required','integer'],
            'key_code'=>['bail','required','not_regex:/.+[0-9]/',new RuleCapitalize,'unique:permissions,key_code,'.(isset($permissionId) ? $permissionId : '' )]
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Bạn Phải Nhập Tên Quyền',
            'name.unique'=>'Quyền đã tồn tại',
            'name.not_regex'=>'Tên Quyền Không Được Chứa Số',
            'description.not_regex'=>'Mô Tả Quyền Không Được Chứa Số',
            'permission.required'=>'Bạn Phải Cung Cấp Quyền Cho Quyền',
            'permission.integer'=>'Có Lỗi Bất Ngờ Xảy Ra',
            'key_code.required'=>'Bạn Phải Nhập Key_Code',
            'key_code.not_regex'=>'Key_Code Không Được Chứa Số',
            'key_code.unique'=>'Key_Code Đã tồn tại',
        ];
        # code...
    }
}
