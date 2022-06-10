<?php

namespace App\Models\Admin;

use App\Models\Clients\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = true;
    protected $fillable=[
        'name',
        'description',
        'view',
        'thumbnail',
        'alias',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(Authors::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapters::class,'product_id');
    }

    public function categorys()
    {
    return $this->belongsToMany(Categorys::class,'category_product','product_id','category_id');        # code...
    }

    public function comments()
    {
        # code...
        return $this->hasMany(Comment::class,'product_id','id');
    }

    public function getQuantity($productId)
    {
        $quantity = count($this->find($productId)->chapters);

        return $quantity;

        # code...
    }
    public function getByAlias(string $alias)
    {
        $product = $this->where('alias',$alias)->first();
        # code...
        return $product;
    }
}
