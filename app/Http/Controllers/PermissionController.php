<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Permission;
// use App\Models\Permission;

class PermissionController extends Controller implements HasMiddleware
{
    public static function middleware() : array 
    {
        return [
            new middleware('permission:CRUD_Permission', only : ['index', 'create', 'store', 'edit', 'update', 'destroy']),
            // new middleware('permission:CRUD_Permission', except : ['index', 'create', 'store'])
        ];
    }
   
    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'desc')->paginate(10);
        return view('permissions.index', compact('permissions'));
    }
    public function create()
    {
        return view('permissions.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:permissions|max:15',
        ]);
        if ($validated) {
            Permission::create(['name' => $request->name]);
            return redirect()->route('permissions.index')->with('success', 'Permission created successfully');
        } else {
            return redirect()->route('permissions.create')->with('error', 'Permission creation failed');
        }
    }
    public function edit($id) {
        $permission = Permission::findOrFail($id);
        return view('permissions.edit', compact('permission'));
    }
    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|max:30|unique:permissions,name,' . $id,
        ]);
        if ($validated) {
            $permission = Permission::findOrFail($id);
            $permission->update(['name' => $request->name]);
            return redirect()->route('permissions.index')->with('success', 'Permission updated successfully');
        } else {
            return redirect()->route('permissions.edit', ['id' => $id])->with('error', 'Permission update failed');
        }
    }
    public function destroy($id) {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully');
    }
}
