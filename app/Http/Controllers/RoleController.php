<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $data['roles'] = Role::orderBy('created_at','desc')->paginate(10);
        $data['permissions'] = Permission::all();
        return view('roles.lists',compact('data'));
    }
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create',compact('permissions'));
    }
    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'name' => 'required|unique:roles|min:3',
        ]);
        $role = Role::create(['name' => $validatedData['name']]);
        if(!empty($request->permissions)){
            foreach($request->permissions as $name){
                $role->givePermissionTo($name);
            }
        }
        return redirect()->route('roles.index')
            ->with('success','Role created successfully');
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }
    public function destroy($id)
    {
    }
}
