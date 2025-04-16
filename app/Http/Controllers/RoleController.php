<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller implements HasMiddleware
{
    public static function middleware() : array 
    {
        return [
            new Middleware('permission:CRUD_Role', only : ['index', 'create', 'store', 'edit', 'update', 'destroy']),
            // new Middleware('permission:CRUD_Role', except : ['index', 'create', 'store'])
        ];
    }
    public static function routes() : array
    {
        return [
            'index' => 'roles.index',
            'create' => 'roles.create',
            'store' => 'roles.store',
            'edit' => 'roles.edit',
            'update' => 'roles.update',
            'destroy' => 'roles.destroy',
        ];
    }

    public function index()
    {
        $data['roles'] = Role::orderBy('created_at','desc')->paginate(10);
        $data['permissions'] = Permission::all();
        return view('roles.lists',compact('data'));
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
    
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        return view('roles.edit',compact('role','permissions','rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|max:20|unique:roles,name,'.$id,
            'permissions' => 'array',
        ]);
        $role = Role::findOrFail($id);
        if($validatedData){

            $role->name = $validatedData['name'];
            $role->save();
    
            if(!empty($request->permissions)){
                $role->syncPermissions($request->permissions);
            }else{
                $role->syncPermissions([]);
            }
            return redirect()->route('roles.index')
                ->with('success','Role updated successfully');
        }else{
            return redirect()->route('roles.edit', ['id' => $id])
                ->with('error','Role update failed');
        }

    }
    public function destroy(Role $role)
    {
        $role->syncPermissions([]);
        $role->delete();
        return redirect()->route('roles.index')
            ->with('success','Role deleted successfully');
    }
    
}
