<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapters extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'content',
        'title',
        'product_id',
        'price',
    ];

    // public $timestamps = true;

    public function product()
    {
        # code...
        return $this->belongsTo(Products::class,'product_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'chapter_sell','chapter_id','user_id');
        # code...
    }

}
