<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function index()
    {
        $permissions=Permission::get();
        return view('Role_Permisssion.Permission.index',[
            'permissions'=>$permissions
        ]);
    }


    public function create()
    {
        return view('Role_Permisssion.Permission.create');

    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>[
                'required',
                'string',
                'unique:permissions,name'
            ]

        ]);
        Permission::create([
            'name'=>$request->name
        ]);
        return redirect('permission')->with('status','Premission Create SuccessFully');

    }


    public function show(Permission $permission)
    {

    }


    public function edit(Permission $permission)
    {

        return view('Role_Permisssion.Permission.edit',[
            'permission'=>$permission
        ]);


    }


    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name'=>[
                'required',
                'string',
                'unique:permissions,name,'.$permission->id
            ]

        ]);
        $permission->update([
            'name'=>$request->name
        ]);
        return redirect('permission')->with('status','Premission Update SuccessFully');


    }


    public function destroy($permissionId )
    {
        $permission=Permission::find($permissionId);
        $permission->delete();
        return redirect('permission')->with('status','Premission Delete SuccessFully');

    }
}
