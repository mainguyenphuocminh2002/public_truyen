<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Helper\Common;
use Illuminate\Http\Request;
use App\Models\Admin\Chapters;
use App\Models\Admin\Products;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminChaptersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $chapters;
    private $products;
    private const GUEST = 'guest';

    public function __construct(Chapters $chapters, Products $products)
    {
        $this->chapters = $chapters;
        $this->products = $products;
        # code...
    }

    public function index()
    {
        // $chapters = $chapters->product;
        // dd($chapters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('createChapters', Chapters::class);
        $user = User::find(auth()->id());
        if($user->checkRole($this::GUEST)){
            $products = $user->products;
        }else{
            $products = $this->products->all();
        }
        return view('Admin.Pages.Chapters.create', compact('products'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            if ($this->authorize('createChapters', Chapters::class)) {
                DB::beginTransaction();
                $rules = [
                    'content' => ['bail', 'required'],
                    'title' => ['bail', 'required'],
                    'product_id' => ['bail', 'required', 'integer'],
                    'price' => ['numeric', 'nullable'],
                ];

                $messages = [
                    'content.required' => 'Phải Nhập Nội Dung Truyện',
                    'product_id.required' => 'Phải Chọn Truyện Để Thêm Truyện',
                    'product_id.integer' => 'Có Lỗi Bất Ngờ Xảy Ra',
                    'title.required' => 'Phải Nhập Tiêu Đề Của Chương Truyện',
                    'price.numeric' => 'Giá tiền phải là số',
                ];
                $blackList = ['_token'];
                $data = $request->except($blackList);
                $validation = Validator::make($data, $rules, $messages);
                $chapter = $this->chapters->create($data);
                $product = Products::find($request->product_id);
                $product->chapters = count($product->chapters()->get());
                $product->save();
                DB::commit();
                return redirect()->route('chapters.show', ['chapter' => $chapter->product_id]);
            }
        } catch (\Throwable $th) {
            DB::rollback();
            dd(1);
            if (isset($validation)) {
                if ($validation->fails()) {
                    return redirect()->back()->withErrors($validation)->withInput();
                }
            }
            //throw $th;
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
        $this->authorize('viewChapters', $this->chapters);
        $product = $this->products->find($id);
        $author = $product->author;
        $chapters = $product->chapters()->paginate(9);
        return view('Admin.Pages.Chapters.index', compact('chapters', 'product', 'author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        session(['chapterId' => $id]);
        $id = Common::changeIdToDecode($id)->getId();
        $chapter = $this->chapters->find($id);
        // $product = $this->products->find($chapter->product_id);
        // $product = $this->products->find($chapter->product_id);
        $product = $chapter->product;
        // dd($product);
        $this->authorize('updateChapters',[Chapters::class,$product]);
        // $product = $this->products;
        $user = User::find(auth()->id());
        if($user->checkRole($this::GUEST)){
            $products = $user->products;
        }else{
            $products = $this->products->all();
        }
        return view('Admin.Pages.Chapters.edit', compact('chapter', 'product', 'products', 'id'));
        // if ($this->authorize('updateChapters', $product)) {
        // }
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $id = session('chapterId');
            $chapter = $this->chapters->find($id);
            $product = $chapter->product;
            if ($this->authorize('updateChapters',[Chapters::class,$product])) {
                DB::beginTransaction();
                $rules = [
                    'content' => ['bail', 'required'],
                    'title' => ['bail', 'required'],
                    'product_id' => ['bail', 'required', 'integer'],
                    'price' => ['numeric', 'nullable'],
                ];

                $messages = [
                    'content.required' => 'Phải Nhập Nội Dung Truyện',
                    'product_id.required' => 'Phải Chọn Truyện Để Thêm Truyện',
                    'product_id.integer' => 'Có Lỗi Bất Ngờ Xảy Ra',
                    'title.required' => 'Phải Nhập Tiêu Đề Của Chương Truyện',
                    'price.numeric' => 'Giá tiền phải là số',
                ];
                $blackList = ['_token', '_method'];
                $data = $request->except($blackList);
                $validation = Validator::make($data, $rules, $messages);
                foreach ($validation->validated() as $key => $value) {
                    $chapter->$key = $value;
                }
                $chapter->save();
                DB::commit();
                return redirect()->route('chapters.show', ['chapter' => $chapter->product_id]);
            }else{
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            DB::rollback();
            if (isset($validation)) {
                if ($validation->fails()) {
                    return redirect()->back()->withErrors($validation)->withInput();
                }
            }else{
                return redirect()->back();
            }
            //throw $th;
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
        if ($this->authorize('deleteChapters', [Chapters::class, $product])) {
            return $this->chapters->destroy($id);
        }
    }
}
