<?php

namespace App\Http\Requests\Admin\Products;

use App\Helper\Common;
use App\Rules\RuleCheckImage;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminProductsRequest extends FormRequest
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
        Common::checkSession(session('productId'));
        return [
            //
            'name'=>['bail','required','not_regex:/^.+\d$/','regex:/^.+\W$/','unique:products,name,'.session('productId')],
            'categorys'=>['bail','required','array'],
            'categorys.*'=>['bail','required','integer'],
            'author'=>['bail','required','integer'],
            'description'=>['bail','required'],
            'image'=>['bail','required_if:image,'. session('productId'),new RuleCheckImage],
            'views'=>['nullable','alpha_num','integer'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Phải Nhập Tên Truyện',
            'name.not_regex'=>'Tên Truyện Phải Chứa Chữ Và Số',
            'name.regex'=>'Tên Truyện Không Được Chứa Kí Tự Đặc Biệt',
            'categorys.required'=>'Phải Chọn Danh Mục Truyện',
            'categorys.array'=>'Có Lỗi Bất Ngờ Xảy Ra',
            'categorys.*.integer'=>'Có Lỗi Bất Ngờ Xảy Ra',
            'author.required'=>'Phải Chọn Tác Giả',
            'author.integer'=>'Có Lỗi Bất Ngờ Xảy Ra',
            'description.required'=>'Phải Nhập Tóm Tắt Truyện',
            'image.required'=>'Phải Chọn Hình Ảnh Cho Truyện',
            'views.alpha_num'=>'Lượt Xem Phải Là Số',
            'views.integer'=>'Lượt Xem Phải Là Số',
        ];
        # code...
    }
}
