<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Common;
use App\Models\Admin\Roles;
use Illuminate\Http\Request;
use App\Models\Admin\Permissions;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissionsRequest;

class AdminPermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $roles;
    private $permissions;
    public function __construct(Roles $roles, Permissions $permissions)
    {
        $this->roles = $roles;
        $this->permissions = $permissions;
        # code...
    }

    public function index()
    {
        //
        $this->authorize('viewPermissions',$this->permissions);
        $permissions = $this->permissions->paginate(9);
        return view('Admin.Pages.Permissions.permissions', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('createPermissions',$this->permissions);
        $permissions = $this->permissions->all()->where('parent_id', 0);
        // dd($permissions);
        return view('Admin.Pages.Permissions.create-permisisons', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionsRequest $request)
    {
        //
        try {
            if($this->authorize('createPermissions',$this->permissions)){
                DB::beginTransaction();
                $blackList = ['_token', 'reg_user', 'permission'];
                $data = $request->except($blackList);
                $data['parent_id'] = $request->permission;
                $this->permissions->create($data);
                DB::commit();
                return redirect()->route('permissions.create');
            }
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    }
    public function edit($id)
    {
        //
        if($this->authorize('updatePermissions',$this->permissions)){
            $id = Common::changeIdToDecode($id)->getId();
            session(['permissionsId' => $id]);
            $permissions = $this->permissions->all()->where('parent_id', 0);
            $permissionChoose = $this->permissions->find($id);
            $parentPermisison = collect([$permissionChoose]);
            return view('Admin.Pages.Permissions.edit-permissions', compact('id', 'permissions', 'permissionChoose', 'parentPermisison'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionsRequest $request)
    {
        try {
            if($this->authorize('updatePermissions',$this->permissions)){
                DB::beginTransaction();
                $id = session('permissionsId');
                $permission = $this->permissions->find($id);
                $blackList = ['_token','_method', 'reg_user','permission'];
                $data = $request->except($blackList);
                $data['parent_id'] = $request->permission;
                foreach($data as $key=>$value){
                    $permission->$key = $value;
                }
    
                $permission->save();
                DB::commit();
                return redirect()->route('permissions.index');
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
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
        //
        if($this->authorize('deletePermissions',$this->permissions)){
            return $this->permissions->destroy($id);
        }
    }
}
