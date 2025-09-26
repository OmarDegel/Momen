<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\RoleRequest;
use App\Models\Permission;
use App\Models\Role;

class RoleController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->setClass('roles');
    }

    public function index()
    {
        $roles = Role::paginate($this->perPage);
        return view('admin.roles.index', compact('roles'));
    }


    public function create()
    {
        $permissions = Permission::get();
        $groupedPermissions = collect($permissions)->groupBy('description');
        return view('admin.roles.create', compact('groupedPermissions'));
    }


    public function store(RoleRequest $request)
    {
        $role = Role::create($request->only(['name', 'display_name']));
        if ($request->input('permissions')) {
            $role->syncPermissions($request->permissions);
        }
        return redirect()->route('dashboard.roles.index')->with('success', __('site.added_successfully'));
    }


    public function show(string $id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::get();
        $groupedPermissions = collect($permissions)->groupBy('description');
        return view('admin.roles.show', compact('role', 'groupedPermissions'));
    }

    public function edit(string $id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::get();
        $groupedPermissions = collect($permissions)->groupBy('description');
        return view('admin.roles.edit', compact('role', 'groupedPermissions'));
    }


    public function update(RoleRequest $request, string $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->only(['name', 'display_name']));
        if ($request->input('permissions')) {
            $role->syncPermissions($request->permissions);
        } else {
            $role->syncPermissions([]);
        }
        return redirect()->route('dashboard.roles.index')->with('success', __('site.updated_successfully'));
    }


    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        if ($role->users->count() > 0) {
            return redirect()->back()->with('error', __('site.cant_delete_role_with_users'));
        }
        $role->delete();
        return back()->with('success', __('site.deleted_successfully'));
    }
}
