<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Products;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    //
    private $products;
    public function __construct(Products $products)
    {
        # code...
        $this->products = $products;
    }
    public function index()
    {
        $highviewProducts  = $this->products->orderByDesc('views')->get();
        $favoritesProducts = $this->products->orderByDesc('favorites')->get();
        $commentProducts       = $this->products->orderByDesc('comments')->get(); 
        return view('Clients.Pages.Home.index',compact('highviewProducts','favoritesProducts','commentProducts'));
        # code...
    }
}
