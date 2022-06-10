<?php

namespace App\Http\Controllers;

use App\Models\User;
use PFBC\Validation;
use App\Models\Admin\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Register extends Controller
{
    //

    private const GUEST = 'guest';
    
    public function __construct()
    {
        # code...
    }

    public function rules()
    {
        return [
            'email'=>['bail','required','email','unique:users,email'],
            'name'=>['bail','required'],
            'password'=>['bail','required'],
            're_password'=>['bail','required','same:password'],
        ];
        # code...
    }

    public function messages()
    {
        return [
            'email.required'=>'Trường bắt buộc phải nhập',
            'email.email'=>'Định dạng không đúng vui lòng nhập email',
            'email.unique'=>'email đã tồn tại',
            'name.required'=>'Trường bắt buộc phải nhập',
            'password.required'=>'Trường bắt buộc phải nhập',
            're_password.required'=>'Trường bắt buộc phải nhập',
            're_password.required'=>'Mật khẩu nhập lại không chính xác',
        ];
        # code...
    }

    public function store(Request $request)
    {
        # code...
        // dd($request->all());
        try{
            DB::beginTransaction();
            $rules = $this->rules();
            $messages = $this->messages();
            // dd($rules);
            // dd($messages);
            $validator = Validator::make($request->except('_token'),$rules,$messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }
            
            $dataValidated = $validator->validated();
            $dataValidated['password'] = Hash::make($dataValidated['password']);
            $user = User::create($dataValidated);
            $roles = new Roles();
            $guest = $roles->where('name',$this::GUEST)->select('id')->first();
            $user->roles()->attach($guest->id);
            DB::commit();
            return redirect()->route('clients.home');
        }
        catch (\Throwable $th){
            DB::rollback();
            return redirect()->back();
        }
    }
}
