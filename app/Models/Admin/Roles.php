<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roles extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description'
    ];

    protected $hidden = [
        'name'
    ];

    private $roles;

    public function __construct()
    {
        # code...
    }

    public function permissions()
    {
        return $this->belongsToMany(Permissions::class,'permission_role','role_id','permission_id');
        # code...
    }

    static function getRoles(){
        $user = auth()->user();
        $roles = new Roles();
        $roles->roles = $user->roles;
        return $roles;
    }

    public function getPermission($permission)
    {
        foreach($this->roles as $role){
            if($role->permissions->contains('key_code',$permission)){
                $permission = $role;
            }
        }
        return $permission;
        # code...
    }
}
