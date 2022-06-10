<?php

namespace App\Models;

use App\Models\Admin\Chapters;
use App\Models\Admin\Products;
use App\Models\Admin\Roles;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
   

    protected $fillable = [
        'name',
        'password',
        'gender',
        'avatar',
        'email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Roles::class,'user_role','user_id','role_id');
    }

    public function products()
    {
        return $this->belongsToMany(Products::class,'product_post','user_id','product_id');
        # code...
    }

    public function chapters()
    {
        return $this->belongsToMany(Chapters::class,'chapter_sell','user_id','chapter_id');
        # code...
    }

    public function CheckPermission($permission){
        $roles = auth()->user()->roles;
        foreach($roles as $role){
            $permissions = $role->permissions;
        }
        return $permissions->contains('key_code',$permission);
    }

    public function checkRole($role)
    {
        # code...
        $roles = auth()->user()->roles;
        foreach($roles as $val){
            if($val->name === $role ){
                return true;
            }
        }
        return false;
    }
}
