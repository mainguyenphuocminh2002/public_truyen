<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Models\Admin\Authors;
use App\Models\Admin\Products;
use App\Models\Admin\Categorys;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ClientCategorysController extends Controller
{
    private $products;
    private $categorys;
    public function __construct(Products $products, Categorys $categorys)
    {
        # code...
        $this->products = $products;
        $this->categorys = $categorys;
    }

    public function category($id = null)
    {
        if ($id) {
            $id = explode('C', $id);
            $categoryChooses = $this->categorys->whereIn('id', $id)->get();
            // dd($categoryChooses);
            $id = collect($id);
            // dd($id);
            session(['categoryOrderId' => $id]);
            $products = collect([]);
            $productWithCategorys = [];
            $categorys = $this->categorys->all();
            if ($categoryChooses) {
                $products = DB::table('products as p')
                    ->distinct()
                    ->join('category_product as cp', 'p.id', 'cp.product_id')
                    ->join('categorys as c', 'c.id', 'cp.category_id')
                    ->select('p.*', 'c.name as category_name')
                    ->whereIn('c.id', $id)
                    ->paginate(9);
                return view('Clients.Pages.Categorys.index', compact('id', 'categoryChooses', 'categorys', 'products'));
            }
        }
        // }
        $id = collect([]);
        session(['categoryOrderId' => $id]);
        $categorys = $this->categorys->all();
        $products = $this->products->orderByDesc('created_at')->paginate(9);
        return view('Clients.Pages.Categorys.index', compact('categorys', 'products'));
        # code...
    }

    public function highView()
    {
        $id =  session('categoryOrderId');
        if ($id && !$id->isEmpty()) {
            $categoryChooses = $this->categorys->whereIn('id', $id)->get();
            $products = collect([]);
            $productWithCategorys = [];
            $categorys = $this->categorys->all();
            if ($categoryChooses) {
                $products = DB::table('products as p')
                    ->distinct()
                    ->join('category_product as cp', 'p.id', 'cp.product_id')
                    ->join('categorys as c', 'c.id', 'cp.category_id')
                    ->select('p.*', 'c.name as category_name')
                    ->whereIn('c.id', $id)
                    ->orderByDesc('views')
                    ->paginate(9);
                return view('Clients.Pages.Categorys.index', compact('id', 'categoryChooses', 'categorys', 'products'));
            }
        } else {
            $categoryChooses = $this->categorys->whereIn('id', $id)->get();
            $products = collect([]);
            $productWithCategorys = [];
            $categorys = $this->categorys->all();
            if ($categoryChooses) {
                $products = $this->products->orderByDesc('views')->paginate(9);
                return view('Clients.Pages.Categorys.index', compact('id', 'categoryChooses', 'categorys', 'products'));
            }
        }
        // }

    }

    public function favorites()
    {
        $id =  session('categoryOrderId');
        if ($id && !$id->isEmpty()) {
            $categoryChooses = $this->categorys->whereIn('id', $id)->get();
            // dd($categoryChooses);
            $products = collect([]);
            $productWithCategorys = [];
            $categorys = $this->categorys->all();
            if ($categoryChooses) {
                $products = DB::table('products as p')
                    ->distinct()
                    ->join('category_product as cp', 'p.id', 'cp.product_id')
                    ->join('categorys as c', 'c.id', 'cp.category_id')
                    ->select('p.*', 'c.name as category_name')
                    ->whereIn('c.id', $id)
                    ->orderByDesc('p.favorites')
                    ->paginate(9);
                return view('Clients.Pages.Categorys.index', compact('id', 'categoryChooses', 'categorys', 'products'));
            }
        } else {
            $categoryChooses = $this->categorys->whereIn('id', $id)->get();
            $products = collect([]);
            $productWithCategorys = [];
            $categorys = $this->categorys->all();
            if ($categoryChooses) {
                $products = DB::table('products as p')
                    ->distinct()
                    ->select('p.*')
                    ->orderByDesc('p.favorites')
                    ->paginate(9);
                return view('Clients.Pages.Categorys.index', compact('id', 'categoryChooses', 'categorys', 'products'));
            }
        }
    }

    public function quantityChapter()
    {
        $id =  session('categoryOrderId');
        if ($id && !$id->isEmpty()) {
            $categoryChooses = $this->categorys->whereIn('id', $id)->get();
            // dd($categoryChooses);
            $products = collect([]);
            $productWithCategorys = [];
            $categorys = $this->categorys->all();
            if ($categoryChooses) {
                $products = DB::table('products as p')
                    ->distinct()
                    ->join('category_product as cp', 'p.id', 'cp.product_id')
                    ->join('categorys as c', 'c.id', 'cp.category_id')
                    ->select('products.*', 'c.name as category_name')
                    ->whereIn('c.id', $id)
                    ->orderByDesc('p.chapters')
                    ->paginate(9);
                return view('Clients.Pages.Categorys.index', compact('id', 'categoryChooses', 'categorys', 'products'));
            }
        } else {
            $categoryChooses = $this->categorys->whereIn('id', $id)->get();
            $products = collect([]);
            $productWithCategorys = [];
            $categorys = $this->categorys->all();
            if ($categoryChooses) {
                $products = DB::table('products as p')
                    ->distinct()
                    ->select('p.*')
                    ->orderByDesc('p.chapters')
                    ->paginate(9);
                return view('Clients.Pages.Categorys.index', compact('id', 'categoryChooses', 'categorys', 'products'));
            }
        }
    }
    
    public function comments()
    {
        $id =  session('categoryOrderId');
        if ($id && !$id->isEmpty()) {
            $categoryChooses = $this->categorys->whereIn('id', $id)->get();
            // dd($categoryChooses);
            $products = collect([]);
            $productWithCategorys = [];
            $categorys = $this->categorys->all();
            if ($categoryChooses) {
                $products = DB::table('products as p')
                    ->distinct()
                    ->join('category_product as cp', 'p.id', 'cp.product_id')
                    ->join('categorys as c', 'c.id', 'cp.category_id')
                    ->select('products.*', 'c.name as category_name')
                    ->whereIn('c.id', $id)
                    ->orderByDesc('p.comments')
                    ->paginate(9);
                return view('Clients.Pages.Categorys.index', compact('id', 'categoryChooses', 'categorys', 'products'));
            }
        } else {
            $categoryChooses = $this->categorys->whereIn('id', $id)->get();
            $products = collect([]);
            $productWithCategorys = [];
            $categorys = $this->categorys->all();
            if ($categoryChooses) {
                $products = DB::table('products as p')
                    ->distinct()
                    ->select('p.*')
                    ->orderByDesc('p.comments')
                    ->paginate(9);
                return view('Clients.Pages.Categorys.index', compact('id', 'categoryChooses', 'categorys', 'products'));
            }
        }
    }
    public function newUpdate()
    {
        $id =  session('categoryOrderId');
        if ($id && !$id->isEmpty()) {
            $categoryChooses = $this->categorys->whereIn('id', $id)->get();
            // dd($categoryChooses);
            $products = collect([]);
            $productWithCategorys = [];
            $categorys = $this->categorys->all();
            if ($categoryChooses) {
                $products = DB::table('products as p')
                    ->distinct()
                    ->join('category_product as cp', 'p.id', 'cp.product_id')
                    ->join('categorys as c', 'c.id', 'cp.category_id')
                    ->select('products.*', 'c.name as category_name')
                    ->whereIn('c.id', $id)
                    ->orderBy('p.updated_at')
                    ->paginate(9);
                return view('Clients.Pages.Categorys.index', compact('id', 'categoryChooses', 'categorys', 'products'));
            }
        } else {
            $categoryChooses = $this->categorys->whereIn('id', $id)->get();
            $products = collect([]);
            $productWithCategorys = [];
            $categorys = $this->categorys->all();
            if ($categoryChooses) {
                $products = DB::table('products as p')
                    ->distinct()
                    ->select('p.*')
                    ->orderBy('p.updated_at')
                    ->paginate(9);
                return view('Clients.Pages.Categorys.index', compact('id', 'categoryChooses', 'categorys', 'products'));
            }
        }
    }
    public function newCreate()
    {
        $id =  session('categoryOrderId');
        if ($id && !$id->isEmpty()) {
            $categoryChooses = $this->categorys->whereIn('id', $id)->get();
            // dd($categoryChooses);
            $products = collect([]);
            $productWithCategorys = [];
            $categorys = $this->categorys->all();
            if ($categoryChooses) {
                $products = DB::table('products as p')
                    ->distinct()
                    ->join('category_product as cp', 'p.id', 'cp.product_id')
                    ->join('categorys as c', 'c.id', 'cp.category_id')
                    ->select('products.*', 'c.name as category_name')
                    ->whereIn('c.id', $id)
                    ->orderBy('p.created_at')
                    ->paginate(9);
                return view('Clients.Pages.Categorys.index', compact('id', 'categoryChooses', 'categorys', 'products'));
            }
        } else {
            $categoryChooses = $this->categorys->whereIn('id', $id)->get();
            $products = collect([]);
            $productWithCategorys = [];
            $categorys = $this->categorys->all();
            if ($categoryChooses) {
                $products = DB::table('products as p')
                    ->distinct()
                    ->select('p.*')
                    ->orderBy('p.created_at')
                    ->paginate(9);
                return view('Clients.Pages.Categorys.index', compact('id', 'categoryChooses', 'categorys', 'products'));
            }
        }
    }

    //
}
