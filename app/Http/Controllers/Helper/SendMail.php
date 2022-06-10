<?php

namespace App\Http\Controllers\Helper;

use App\Helper\Common;
use Mockery\Matcher\HasKey;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class SendMail
{
    private $token;

    public function __construct()
    {
        # code...
    }

    public static function sendEmail($user)
    {
        $token = Common::makeToken();
        $data = ['name'=>$user['name'],'email'=>$user['email'],'token'=>$token];
        $t = time();
        DB::table('password_resets')->insert([
            'email' => $user['email'],
            'token' =>Hash::make($token),
            'created_at'=>date("Y-m-d",$t),
        ]);
        Mail::send('Clients.Pages.RecoveryPassword.email',$data,function($message) use ($data){
            $message->to($data['email'])->subject('Token ResetPassword');
            $message->from($data['email'],$data['name']);
            // gui den email cua user
        });
        // return ve Token
        return $token;
        # code...
    }
}
