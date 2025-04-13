<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
// use App\Models\Permission;

class PermissionController extends Controller
{
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
    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}
