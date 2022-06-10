<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Common;
use App\Models\User;
use App\Models\Admin\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\UserRequest;
use Faker\Core\File;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $user;
    private $roles;
    public function __construct(User $user, Roles $roles)
    {
        $this->user = $user;
        $this->roles = $roles;
    }

    public function index()
    {
        $user = auth()->user();
        $this->authorize('viewAnyUser',User::class);
        $users = $this->user->paginate(10);
        return view('Admin.Pages.User.users', compact('users'));
        # code...
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('createUser',User::class);
        $roles = $this->roles->all();
        return view('Admin.Pages.User.create-user', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            if($this->authorize('createUser',User::class)){
                DB::beginTransaction();
                $file = $request->file('avatar');
                $imgName = $file->getClientOriginalName();
                $imgName = explode('.', $imgName);
                $imgName[0] = rand(0, 1000000) . time();
                $imgName = implode('.', $imgName);
                $file->storeAs('avatar', $imgName);
                $file->move(public_path('avatar/' . 'Admin/' . $request->name), $imgName);
                $blacklist = ['re_password', '_token', 'roles', 'reg_user'];
                $data = $request->except($blacklist);
                $data['avatar'] = 'avatar/' . 'Admin/' . $request->name . '/' . $imgName;
                data_set($data, 'password', Hash::make($data['password']));
                $user = $this->user->create($data);
                $user->roles()->attach($request->roles);
                DB::commit();
                return redirect()->route('users.index');
            }
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
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
        if($this->authorize('updateUser',User::class)){
            $id = Common::changeIdToDecode($id)->getId();
            session(['id' => $id]);
            $user = $this->user->find($id);
            $roleOfUser = $user->roles;
            $roles = $this->roles->all();
            return view('Admin.Pages.User.edit-user', compact('user', 'roles', 'roleOfUser', 'id'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        // dd($id);
        try {
            if($this->authorize('updateUser',User::class)){
                DB::beginTransaction();
                $data = [];
                $id = session('id');
    
                $user = $this->user->find($id);
                if($request->file('avatar')){
                    if($user->avatar){
                        unlink($user->avatar);
                    }
                    $file = $request->file('avatar');
                    $imgName = $file->getClientOriginalName();
                    $imgName = explode('.', $imgName);
                    $imgName[0] = rand(0, 1000000) . time();
                    $imgName = implode('.', $imgName);
                    $file->storeAs('avatar', $imgName);
                    $file->move(public_path('avatar/' . 'Admin/' . $user->name), $imgName);
                    $avatar = 'avatar/' . 'Admin/' . $user->name . '/' . $imgName;
                }
                $blacklist = ['re_password', '_token', 'roles', 'reg_user','_method','email','phone'];
                $data = $request->except($blacklist);
                if(isset($avatar)){
                    $data['avatar'] = $avatar;
                }
                foreach($data as $key => $value){
                    $user->$key = $value;
                }
                $user->password = Hash::make($data['password']);
                $user->save();
                DB::commit();
                return redirect()->route('users.index');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
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
        $this->authorize('deleteUser',User::class);
        return $this->user->destroy($id);

    }
}
