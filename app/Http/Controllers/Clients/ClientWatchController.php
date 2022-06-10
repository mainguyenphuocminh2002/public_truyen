<?php

namespace App\Http\Controllers\Clients;

use App\Helper\Common;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Chapters;
use App\Models\Admin\Products;
use App\Models\Clients\Comment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ClientWatchController extends Controller
{
    //
    private $products;
    private $comments;
    private $chapters;
    public function __construct(Products $products,Comment $comments,Chapters $chapters)
    {
        $this->products = $products;
        $this->comments = $comments;
        $this->chapters = $chapters;
        # code...
    }

    public function watch($alias,$chap)
    {
        $product = $this->products->getByAlias($alias);
        if($chap){
            $chapter = $this->chapters->where('id',$chap)->first();
        }else{
            $chapter = $this->chapters->where('product_id',$product->id)->first();
        }
        if(isset($chapter->price)){
            $chapterPriceId = $chapter->id;
            session(['chapterPriceId'=>$chapterPriceId]);
            $user = User::find(auth()->id());
            if(!$user){
                return redirect()->route('clients.home');
            }else{
                $userBuyIt = collect($user->chapters);
            }
        }
        // $chapterViewed = cookie('chapViewed',$chapter->id,time() + (86400 * 30));
        $listChapters = $this->chapters->where('product_id',$product->id)->get(['title','id']);
        $comments = $this->comments->where('product_id',$product->id)->paginate(9);
        return view('Clients.Pages.Watch.index',compact('product','chapter','listChapters','comments','userBuyIt'));
        # code...
    }

    public function buyChapter($price)
    {
        try {
            DB::beginTransaction();
            $chapterId = session('chapterPriceId','');
            $user = User::find(auth()->id());
            if($price > ($user->ticket) ){
                return redirect()->back();
            }else{
                $user->ticket = $user->ticket - $price;
                $user->save();
                $user->chapters()->attach($chapterId);
            }
            DB::commit();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();
        }
        
        # code...
    }
}
