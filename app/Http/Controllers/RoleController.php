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
