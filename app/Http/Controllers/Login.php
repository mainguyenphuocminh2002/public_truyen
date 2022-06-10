<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Helper\SendMail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class Login extends Controller
{
    //
    protected const GUEST = 'guest';
    public function login(Request $request, User $user)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $roles = auth()->user()->roles;
            if($user->checkRole($this::GUEST)){
                return redirect('/');
            }else{
                return redirect()->route('admin.home');
            }
        }else{
            return redirect()->route('clients.home');
        }
    }



    public function resetPassword(Request $request)
    {
        # code...
        $email = $request->only('email');
        $user = User::firstWhere('email',$email);
        $userInfo = collect(['email'=>$user->email,'name'=>$user->name])->all();
        SendMail::sendEmail($userInfo);
        session(['email'=>$email]);
        unset($user);
        return redirect()->route('checkTokenPage');
        
    }

    public function checkToken(Request $request)
    {
        # code...
        $email = session('email','');
        session()->forget('email');
        if(empty($email)){
            return redirect()->route('clients.home');
        }
        // dd($request->only('token')['token']);
        $tokenGive = $request->only('token')['token'];
        $tokenReset = DB::table('password_resets')->where('email',$email)->first()->token;
        if(Hash::check($tokenGive,$tokenReset)){
            session(['token'=>$tokenReset]);
            return redirect()->route('recoveryPasswordPage');
        }
    }


    public function recoveryPassword(Request $request)
    {
        # code...
        $token = session('token','');
        session()->forget('token');
        if(empty($token)){
            return redirect()->route('clients.home');
        }
        $rules = [
            'new_password' => ['bail','required',],
            'password_confirm'=>['bail','required','same:new_password'],
        ];

        $messages = [
            'new_password.required'=>'Bạn phải nhập mật khẩu mới',
            'password_confirm.required'=>'Bạn phải nhập lại mật khẩu',
            'password_confirm.same'=>'Mật khẩu nhập lại phải giống mật khẩu mới',
        ];

        $validator = Validator::make($request->only(['new_password','password_confirm']),$rules,$messages);
        $dataValidated = $validator->validated();
        $new_password = Hash::make($dataValidated['new_password']);
        try {
            DB::beginTransaction();
            $email = DB::table('password_resets')->where('token',$token)->first()->email;
            $user = User::firstWhere('email',$email);
            $user->password = $new_password;
            $user->save();
            DB::commit();
            return redirect()->route('clients.home');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
        }
    }
}
