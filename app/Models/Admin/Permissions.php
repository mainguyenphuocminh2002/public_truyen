<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permissions extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'name',
        'description',
        'key_code',
        'parent_id'
    ];

    protected $hidden = [
        'name',
        'key_code',
    ];

    public function roles()
    {
        return $this->belongsToMany(Roles::class,'permission_role','role_id','permission_id');
        # code...
    }

}
