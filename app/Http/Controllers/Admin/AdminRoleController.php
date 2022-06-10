<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Common;
use App\Models\User;
use App\Models\Admin\Roles;
use Illuminate\Http\Request;
use App\Models\Admin\Permissions;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\RolesRequest;
use App\Http\Controllers\Controller;
use App\Policies\Admin\AdminRolesPolicy;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $roles;
    private $permissions;
    public function __construct(Roles $roles,Permissions $permissions)
    {
        $this->roles = $roles;
        $this->permissions = $permissions;
        # code...
    }



    public function index()
    {
        $this->authorize('viewRoles',Roles::class);
        $roles = $this->roles->paginate(10);
        return view('Admin.Pages.Roles.roles',compact('roles'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('createRoles',Roles::class);
        //
        $permissions = $this->permissions->get();
        return view('Admin.Pages.Roles.create-role',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesRequest $request)
    {
        //
        
        try {
            if($this->authorize('createRoles',Roles::class)){
                DB::beginTransaction();
                $blackList = ['_token','reg_user','permissions'];
                $data = $request->except($blackList);
                $roles = $this->roles->create($data);
                $roles->permissions()->attach($request->permissions);
                DB::commit();
                return redirect()->route('roles.index');    
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
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
        if($this->authorize('updateRoles',Roles::class)){
            $id = Common::changeIdToDecode($id)->getId();
            session(['roleId'=>$id]);
            $role = $this->roles->find($id);
            $permissions = $this->permissions->all();
            $permissionOfUser = $role->permissions;
            return view('Admin.Pages.Roles.edit-role',compact('id','role','permissions','permissionOfUser'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolesRequest $request)
    {
        //
        try {
            if($this->authorize('updateRoles',Roles::class)){
                DB::beginTransaction();
                $id = session('roleId');
                $blackList = ['reg_user','_token','permissions','_method'];
                $data = $request->except($blackList);
                $role = $this->roles->find($id);
                foreach($data as $key=>$value){
                    $role->$key = $value;
                }
                $role->save();
                $role->permissions()->sync($request->permissions);
                DB::commit();
                return redirect()->route('roles.index');
            }
            //code...
        } catch (\Throwable $th) {
            //throw $th;
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
        return $this->roles->destroy($id);
    }
}
