<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleController extends Controller

{
    public function __construct()
    {
        $this->middleware('permission:view role',['only'=>['index']]);
        $this->middleware('permission:create role',['only'=>['create','store','addPermissionToRole','updatePermissionToRole']]);
        $this->middleware('permission:update role',['only'=>['update','edit']]);
        $this->middleware('permission:delete role',['only'=>['destroy']]);
    }

    public function index()
    {
        $role=Role::get();
        return view('Role_Permisssion.role.index',[
            'roles'=>$role
        ]);
    }


    public function create()
    {
        return view('Role_Permisssion.role.create');

    }


    public function store(Request $request,Role $role)
    {
        $request->validate([
            'name'=>[
                'required',
                'string',
                'unique:roles,name,'.$role->id
            ]

        ]);
        Role::create([
            'name'=>$request->name
        ]);
        return redirect('roles')->with('status','Role Create SuccessFully');

    }


    public function show(Role $role)
    {

    }


    public function edit(Role $role)
    {

        return view('Role_Permisssion.role.edit',[
            'role'=>$role
        ]);


    }


    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>[
                'required',
                'string',
                'unique:roles,name,'.$role->id
            ]

        ]);
        $role->update([
            'name'=>$request->name
        ]);
        return redirect('roles')->with('status','Role Update SuccessFully');


    }


    public function destroy($roleId )
    {
        $role=Role::find($roleId);
        $role->delete();
        return redirect('roles')->with('status','Role Delete SuccessFully');

    }
    public function addPermissionToRole($roleId){
        $permission=Permission::get();
        $role=Role::findOrFail($roleId);
        $rolePermission=DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id',$role->id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
        return view('Role_Permisssion.role.add-permission',[
            'role'=>$role,
            'permissions'=>$permission,
            'rolePermissions'=>$rolePermission
        ]);
    }
    public function updatePermissionToRole(Request $request,$roleId){
        $request->validate([
            'permission'=>'required'
        ]);
        $role=Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('status','Permission Added To Role');

    }
}