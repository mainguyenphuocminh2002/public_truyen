<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Admin\Authors;
use App\Models\Admin\Categorys;
use App\Models\Admin\Products;
use App\Models\Clients\Comment;
use App\Models\Clients\Favourite;
use Illuminate\Http\Request;

class ClientDetailController extends Controller
{
    //
    private $products;
    private $author;
    private $categorys;
    private $comments;
    private $favourites;
    public function __construct(Products $products,Categorys $categorys,Authors $author,Comment $comment,Favourite $favourite)
    {
        # code...
        $this->favourites = $favourite;
        $this->products = $products;
        $this->author = $author;
        $this->categorys = $categorys;
        $this->comments = $comment;
    }

    public function detail($slug)
    {
        $product = $this->products->where('alias',$slug)->first();
        $categorys  = $product->categorys;
        $author = $product->author;
        $chapters = $product->chapters()->get();
        $comments = $this->comments->where('product_id',$product->id)->orderByDesc('created_at')->paginate(7);
        $favorites = $product->favorites;
        $user = auth()->user();
        if($user){
            $userId = $user->id;
            $favouritesUserChoose = $this->favourites->where('user_id',$userId)->where('product_id',$product->id)->first();
            // dd($favouritesUserChoose);
            return view('Clients.Pages.Detail.index',compact('product','author','categorys','favouritesUserChoose','chapters','favorites','comments'));
        }

        return view('Clients.Pages.Detail.index',compact('product','author','categorys','chapters','comments','favorites'));

        # code...
    }
}
