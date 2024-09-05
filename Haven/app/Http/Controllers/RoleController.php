<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('roles.index',[
            'roles'=>$roles,
            
        ]);
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|string|max:255|unique:roles,role',
        ]);

        Role::create($request->all());

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'role' => 'required|string|max:255|unique:roles,role,' . $role->id,
        ]);

        $role->update($request->all());

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        // Kiểm tra xem vai trò có người dùng liên quan không
        if ($role->users()->count() > 0) {
            return redirect()->route('roles.index')->with('error', 'Còn User mang role này hãy xóa hết user mang role này');
        }
    
        // Xóa vai trò
        $role->delete();
    
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
    
}
