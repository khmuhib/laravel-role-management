<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->latest()->get();
        // return $roles;
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3|max:30|regex:/^[A-Za-z0-9\s]+$/|unique:roles,name',
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->route('role.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $role = Role::create([
                'name' => strtolower($request->name),
            ]);
            $role->syncPermissions($request->permission);

            Toastr::success('Success', 'Role Created Successfully');
        } catch (\Throwable $th) {
            Toastr::error('Error', 'Something Went Wrong');
            return back();
        }


        return redirect()->route('role.index');
    }

    public function edit($id)
    {
        $roles = Role::with('permissions')->find($id);
        $permissions = Permission::all();

        return view('admin.role.edit', compact('roles', 'permissions'));
    }

    public function update(Request $request, $id)
    {

        $role = Role::find($id);
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3|max:30|regex:/^[A-Za-z0-9\s]+$/|unique:roles,name,' . $role->id
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->route('role.edit', $role->id)
                    ->withErrors($validator)
                    ->withInput();
            }

            $role->update([
                'name' => strtolower($request->name)
            ]);

            $role->syncPermissions($request->permission);

            Toastr::success('Success', 'Role Updated');
        } catch (\Throwable $th) {
            Toastr::error('Error', 'Something Went Wrong');
            return back();
        }

        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        try {
            if (!is_null($role)) {
                $role->delete();
            }
            Toastr::success('Success', 'Role Deleted');
            return back();
        } catch (\Throwable $th) {
            Toastr::error('Error', 'Something Went Wrong');
            return back();
        }
    }

    public function permission()
    {
        $permissions = Permission::all();
        // dd($permissions);
        return view('admin.role.pemission', compact('permissions'));
    }
}
