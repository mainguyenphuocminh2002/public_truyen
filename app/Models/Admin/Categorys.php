<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorys extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'name',
        'parent_id',
        'pivot_category_id'
    ];

    public function products($id = [])
    {
        return $this->belongsToMany(Products::class,'category_product','category_id','product_id');
        # code...
    }
}
