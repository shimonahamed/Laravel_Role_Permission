<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view user',['only'=>['index']]);
        $this->middleware('permission:create user',['only'=>['create','store']]);
        $this->middleware('permission:update user',['only'=>['update','edit']]);
        $this->middleware('permission:delete user',['only'=>['destroy']]);
    }

    public function index()
    {
        $users=User::get();
        return view('Role_Permisssion.user.index',[
            'users'=>$users
        ]);

    }

    public function create()
    {
        $roles=Role::pluck('name','name')->all();
        return view('Role_Permisssion.user.create',[
            'roles'=>$roles
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|string|max:50|unique:users,email',
            'password'=>'required|string|max:20|min:4',
            'roles'=>'required ',
        ]);
        $user=  User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $user->syncRoles($request->roles);
        return redirect('/users')->with('status','User create Successfully with Roles');
    }

    public function show($id)
    {
        // Code to display a specific user
    }

    public function edit(User $user)
    {
        $roles=Role::pluck('name','name')->all();
        $userRoles=$user->roles->pluck('name','name')->all();
        return view('Role_Permisssion.user.edit',[
            'user'=>$user,
            'roles'=>$roles,
            'userRoles'=>$userRoles,
        ]);

    }

    public function update(Request $request,User $user)
    {
        $request->validate([
            'name'=>'required|string|max:50',
            'password'=>'nullable|string|max:20|min:4',
            'roles'=>'required ',
        ]);
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,

        ];
        if (!empty($request->password)){
            $data +=[
                'password'=>Hash::make($request->password),
            ];
        }
        $user->update($data);
        $user->syncRoles($request->roles);
        return redirect('/users')->with('status','User Update Successfully with Roles');

    }

    public function destroy($userId)
    {
        $user=User::findOrFail($userId);
        $user->delete();
        return redirect('/users')->with('status','User Delete Successfully ');

    }
}
