<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Common;
use Illuminate\Http\Request;
use App\Models\Admin\Authors;
use App\Models\Admin\Products;
use App\Models\Admin\Categorys;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\StoreAdminProductsRequest;
use App\Http\Requests\Admin\Products\UpdateAdminProductsRequest;
use App\Models\User;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $products;
    private $authors;
    private $categorys;
    // private $user;
    private const GUEST = 'guest';

    public function __construct(Products $products, Authors $authors, Categorys $categorys, User $user)
    {
        # code...
        $this->authors = $authors;
        $this->products = $products;
        $this->categorys = $categorys;
        // $this->user = $user;
    }
    public function index()
    {
        //
        $products = $this->products->paginate(9);
        return view('Admin.Pages.Products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $authors = $this->authors->all();
        $categorys = $this->categorys->all()->where('parent_id', '!=', '0');
        return view('Admin.Pages.Products.create', compact('authors', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminProductsRequest $request)
    {
        try {
            DB::beginTransaction();
            // Product
            $blackList = ['_token', 'create_product', 'categorys', 'thumbnail', 'author'];
            $data = $request->except($blackList);
            $data['author_id'] = $request->author;
            $thumbnail = $request->file('image');
            $path = Common::handleFile($thumbnail);
            $data['thumbnail'] = $path;
            $data['alias'] = Common::vnToStr($data['name']);
            $data['views'] = $data['views'];
            $product = $this->products->create($data);
            // dd($product);
            $product->categorys()->attach($request->categorys);
            // End Product
            $currentUser = auth()->id();
            $currentUser = User::find($currentUser);
            $currentUser->products()->attach($product->id);
            DB::commit();
            if($currentUser->checkRole($this::GUEST)){
                return redirect()->route('clients.editProducts');
            }else{
                return redirect()->route('products.index');
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $id = Common::changeIdToDecode($id)->getId();
        session(['productId' => $id]);
        $product = $this->products->find($id);
        if($this->authorize('updateProducts',[Products::class,$product])){
            $authors = $this->authors->all();
            $authorChoose = collect([$product->author]);
            // dd($authorChoose);
            $categorys = $this->categorys->all()->where('parent_id', '!=', 0);
            $categoryChooses = $product->categorys;
            $categoryChooses = collect($categoryChooses);
            return view('Admin.Pages.Products.edit', compact('id', 'product', 'authors', 'categorys', 'authorChoose', 'categoryChooses'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminProductsRequest $request)
    {
        try {
            DB::beginTransaction();
            $id = session('productId');
            $product = $this->products->find($id);
            if($this->authorize('updateProducts',[Products::class,$product])){
                $blackList = ['_method', 'author', '_token', 'create_product', 'categorys', 'image'];
                $data = $request->except($blackList);
                $data['author_id'] = $request->author;
                $data['views'] = $data['views'];
                $thumbnail = $request->file('image');
                $data['thumbnail'] = Common::handleFile($thumbnail);
                foreach ($data as $key => $value) {
                    $product->$key = $value;
                }
                $product->categorys()->sync($request->categorys);
                $product->save();
                DB::commit();
                return redirect()->route('products.index');
            }
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back();
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        if($this->authorize('deleteProducts',[Products::class,$product])){
            return $this->products->destroy($id);
        }
    }
}
