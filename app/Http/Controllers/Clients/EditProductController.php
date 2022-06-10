<?php

namespace App\Http\Controllers\Clients;

use App\Helper\Common;
use App\Http\Controllers\Controller;
use App\Models\Admin\Authors;
use App\Models\Admin\Categorys;
use Illuminate\Http\Request;

class EditProductController extends Controller
{
    //
    private $authors;
    private $categorys;

    public function __construct(Authors $authors, Categorys $categorys)
    {
        # code...
        Common::checkLogin();
        $this->authors = $authors;
        $this->categorys = $categorys;
    }

    public function index()
    {
        # code...
        
        $user = auth()->user();
        $productPost = $user->products;
        $quantityChapters = 0;
        foreach($productPost as $item){
            $quantityChapters += count($item->chapters()->get());
        }
        return view('Clients.Pages.Update.index',compact('productPost','quantityChapters'));
        
    }

    public function createProduct()
    {
        # code...
        $authors = $this->authors->all();
        $categorys = $this->categorys->all()->where('parent_id', '!=', '0');
        return view('Clients.Pages.Update.Products.create',compact('authors','categorys'));
    }
}
