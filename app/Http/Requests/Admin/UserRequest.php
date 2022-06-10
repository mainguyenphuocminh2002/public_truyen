<?php

namespace App\Http\Requests\Admin;

use App\Helper\Common;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
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
        if($this->route()->parameters['user']){
            $userId = $this->route()->parameters['user'];
            $userId = Common::changeIdToDecode($userId)->getId();
        }
        // dd(isset($userId));
        return [
            'avatar' => ['mimes:png,jpg,jpeg', 'file', 'max:3100'],
            'roles' => ['bail', 'required', 'array'],
            'roles.*' => 'integer',
            'name' => ['bail', 'required', ],
            'email' => ['bail', 'required', 'email', 'unique:users,email,'. (isset($userId) ? $userId  : '')],
            'phone' => ['nullable', 'alpha_num', 'max:10'],
            'gender' => ['bail', 'required', 'integer'],
            'password' => ['bail', 'required', 'min:8'],
            're_password' => ['bail', 'required', 'same:password']
        ];
    }

    public function messages()
    {
        return [
            'avatar.mimes' => 'Hình Đại Điện Không Đúng Định Dạng',
            'avatar.max' => 'Hình Đại Diện Bạn Tải Lên Quá Lớn',
            'roles.required' => 'phải cấp quyền cho người dùng',
            'roles.*.integer' => 'có lỗi bất ngờ xảy ra',
            'name.required' => 'phải điền tên đăng nhập',
            'email.required' => 'bạn phải điền email',
            'email.email' => 'email không đúng định dạng',
            'email.unique' => 'email đã tồn tại',
            'phone.alpha_num' => 'số điện thoại chỉ được là số',
            'phone.max' => 'vui lòng nhập đúng số điện thoại',
            'gender.integer' => 'có lỗi bất ngờ xảy ra',
            'password.required' => 'bạn phải nhập mật khẩu',
            'password.min' => 'mật khẩu phải lớn hớn 8 kí tự',
            're_password.required' => 'bạn phải nhập lại mật khẩu',
            're_password.same' => 'mật khẩu nhập lại không trùng khớp',
        ];
        # code...
    }


}
