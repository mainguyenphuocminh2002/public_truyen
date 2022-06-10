<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Common;
use Illuminate\Http\Request;
use App\Models\Admin\Authors;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminAuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $authors;
    public function __construct(Authors $authors)
    {
        # code...
        $this->authors = $authors;
    }

    public function index()
    {
        $this->authorize('viewAuthors',$this->authors);
        $authors = $this->authors->paginate(10);
        return view('Admin.Pages.Authors.index',compact('authors'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('createAuthors',$this->authors);
        return view('Admin.Pages.Authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if($this->authorize('createAuthors',$this->authors)){
                DB::beginTransaction();
                $rule = [
                    'name'=>['bail','required','not_regex:/.+[0-9]/']
                ];
                $message = [
                    'name.required'=>'Tên Tác Giả Bắt Buộc Phải Nhập',
                    'name.not_regex'=>'Tên Tác Giả Không Được Chứa Số',
                ];
                $data = $request->except(['create_author','_token']);
                $validation = Validator::make($data,$rule,$message);
                $this->authors->create($data);
                DB::commit();
                return redirect()->route('authors.index');
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            if(isset($validation)){
                if($validation->fails()){
                    return redirect()->back()->withErrors($validation)->withInput();
                }
            }
        }
        //
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
        if($this->authorize('updateAuthors',$this->authors)){
            $id = Common::changeIdToDecode($id)->getId();
            session(['authorId'=>$id]);
            $author = $this->authors->find($id);
            return view('Admin.Pages.Authors.edit',compact('author'));
        }
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
            //code...
            if($this->authorize('updateAuthors',$this->authors)){
                DB::beginTransaction();
                $rule = [
                    'name'=>['bail','required','not_regex:/.+[0-9]/']
                ];
                $message = [
                    'name.required'=>'Tên Tác Giả Bắt Buộc Phải Nhập',
                    'name.not_regex'=>'Tên Tác Giả Không Được Chứa Số',
                ];
                $validation = Validator::make($request->validated(),$rule,$message);
                $id = session('authorId');
                $author = $this->authors->find($id);
                $author->name = $request->name;
                $author->save();
                DB::commit();
                return redirect()->route('authors.index');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            if(isset($validation)){
                if($validation->fails()){
                    return redirect()->back()->withErrors($validation)->withInput();
                }
            }
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->authorize('deleteAuthors',$this->authors);
        $id = Common::changeIdToDecode($id)->getId();
        return $this->authors->destroy($id);
    }
}
