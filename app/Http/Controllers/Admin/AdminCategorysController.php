<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Common;
use Illuminate\Http\Request;
use App\Models\Admin\Categorys;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminCategorysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $categorys;
    public function __construct(Categorys $categorys)
    {
        $this->categorys = $categorys;
        # code...
    }
    public function index()
    {
        //

        $this->authorize('viewCategorys', $this->categorys);
        $this->authorize('createCategorys', Categorys::class);
        $categorys = $this->categorys->paginate(9);
        return view('Admin.Pages.Categorys.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            if ($this->authorize('createCategorys', $this->categorys)) {
                DB::beginTransaction();
                $rules = [
                    'name' => ['bail', 'required', 'not_regex:/.+[0-9]/'],
                    'parent_id' => ['bail', 'required', 'integer'],
                ];

                $messages = [
                    'name.required' => 'Phải Điền Tên Danh Mục',
                    'name.not_regex' => 'Tên Danh Mục Không Được Chứa Số',
                    'parent_id.required' => 'Phải Điền Cấp Cha Danh Mục',
                    'parent_id.integer' => 'Có Lỗi Bất Ngờ Xảy Ra',

                ];
                $data = $request->except(['create_category', '_token']);
                $validation = Validator::make($data, $rules, $messages);
                $this->categorys->create($data);
                DB::commit();
                return redirect()->route('categorys.index');
            }
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            if(isset($validation)){
                if ($validation->fails()) {
                    return redirect()->back()->withErrors($validation)->withInput();
                }
            }
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
        if ($this->authorize('updateCategorys', $this->categorys)) {
            $id = Common::changeIdToDecode($id)->getId();
            session(['categorysId' => $id]);
            $category = $this->categorys->find($id);
            $categoryChoose = collect([$category]);
            $categorys = $this->categorys->all();
            return view('Admin.Pages.Categorys.edit', compact('categorys', 'category', 'categoryChoose','id'));
        }
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            if ($this->authorize('updateCategorys', $this->categorys)) {
                DB::beginTransaction();
                $rules = [
                    'name' => ['bail', 'required', 'not_regex:/.+[0-9]/'],
                    'parent_id' => ['bail', 'required', 'integer'],
                ];

                $messages = [
                    'name.required' => 'Phải Điền Tên Danh Mục',
                    'name.not_regex' => 'Tên Danh Mục Không Được Chứa Số',
                    'parent_id.required' => 'Phải Điền Cấp Cha Danh Mục',
                    'parent_id.integer' => 'Có Lỗi Bất Ngờ Xảy Ra',

                ];
                $data = $request->except(['edit_category', '_method', '_token']);
                $validation = Validator::make($data, $rules, $messages);
                $id = session('categorysId');
                $categorys = $this->categorys->find($id);
                foreach ($data as $key => $value) {
                    $categorys->$key = $value;
                }
                $categorys->save();
                DB::commit();
                return redirect()->route('categorys.index');
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            if (isset($validation)) {
                if ($validation->fails()) {
                    return redirect()->back()->withErrors($validation)->withInput();
                }
            }
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
        $this->authorize('deleteCategorys', $this->categorys);
        $id = Common::changeIdToDecode($id)->getId();
        return $this->categorys->destroy($id);   //
    }
}
