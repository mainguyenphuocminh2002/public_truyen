<?php

namespace App\Http\Controllers\Clients;

use App\Models\User;
use App\Helper\Common;
use Illuminate\Http\Request;
use App\Models\Admin\Products;
use App\Models\Clients\Favourite;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect()->route('clients.home');
        # code...
    }

    public function profile()
    {
        # code...
        $user = auth()->user();
        $productPost = $user->products;
        $quantityChapters = 0;
        foreach ($productPost as $item) {
            $quantityChapters += count($item->chapters()->get());
        }
        return view('Clients.Pages.Profile.index', compact('productPost', 'quantityChapters', 'user'));
    }

    public function profileStore(Request $request)
    {
        try {
            # code...
            DB::beginTransaction();
            $rules = [
                'avatar' => ['mimes:png,jpg,jpeg', 'file', 'max:3100'],
                'name' => ['bail', 'required'],
                'phone' => ['nullable', 'alpha_num', 'max:10'],
                'gender' => ['bail', 'required', 'integer'],
                'password' => ['bail', 'required', 'min:8'],
                're_password' => ['bail', 'required', 'same:password']
            ];

            $messages = [
                'avatar.mimes' => 'Hình Đại Điện Không Đúng Định Dạng',
                'avatar.max' => 'Hình Đại Diện Bạn Tải Lên Quá Lớn',
                'name.required' => 'phải điền tên đăng nhập',
                'phone.alpha_num' => 'số điện thoại chỉ được là số',
                'phone.max' => 'vui lòng nhập đúng số điện thoại',
                'gender.integer' => 'có lỗi bất ngờ xảy ra',
                'password.required' => 'bạn phải nhập mật khẩu',
                'password.min' => 'mật khẩu phải lớn hớn 8 kí tự',
                're_password.required' => 'bạn phải nhập lại mật khẩu',
                're_password.same' => 'mật khẩu nhập lại không trùng khớp',
            ];
            // dd($request->all());

            $validator = Validator::make($request->except('_token'), $rules, $messages);
            $dataValidated = $validator->validated();
            $dataValidated['avatar'] = Common::handleFile($dataValidated['avatar'], true);
            $user = User::find(auth()->id());
            foreach ($dataValidated as $key => $val) {
                $user->$key = $val;
            }
            $user->password = Hash::make($dataValidated['password']);
            unset($user->re_password);
            $user->save();
            DB::commit();
            return redirect()->route('clients.profile');
        } catch (\Throwable $e) {
            # code...
            DB::rollback();
            if($validator->fails()){
                return redirect()->back();
            }
        }

        # code...
    }

    public function favourites()
    {
        # code...
        $favourites = Favourite::where('user_id', auth()->id())->get();
        $favoritesProducts = [];
        foreach ($favourites as $value) {
            $favoritesProducts[] = Products::find($value->product_id);
        }
        $favoritesProducts = collect($favoritesProducts);
        // dd($products);
        return view('Clients.Pages.Favourites.index', compact('favoritesProducts'));
    }

    public function ticket()
    {
        # code...
    }
}
