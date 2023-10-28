<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->latest()->paginate(20);
        $roles = Role::all();

        // return $users;
        return view('admin.user.index', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3|max:30|regex:/^[A-Za-z0-9\s]+$/|unique:roles,name',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->route('user.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $user = User::create([
                'name' => strtolower($request->name),
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => $request->status,
            ]);
            // dd($user);
            $user->syncRoles($request->roles);

            Toastr::success('Success', 'Role Created Successfully');
        } catch (\Throwable $th) {
            Toastr::error('Error', 'Something Went Wrong');
            return back();
        }


        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = User::with('roles')->find($id);
        $userRoles = $user->roles->pluck('id')->toArray();
        $roles = Role::all();

        // return $user;
        return view('admin.user.edit', compact('user', 'userRoles', 'roles'));
    }

    public function update(Request $request, $id)
    {
        // Find the user based on the provided $id.


        try {
            $user = User::find($id);
            // Validate the request data.
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3|max:30|regex:/^[A-Za-z0-9\s]+$/|unique:users,name,' . $user->id,
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->route('user.edit', $user->id)
                    ->withErrors($validator)
                    ->withInput();
            }

            // Update the user's information in the database.
            $user->update([
                'name' => strtolower($request->name),
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => $request->status,
            ]);

            // Synchronize the user's roles based on the selected roles in the form.
            $user->syncRoles($request->roles);

            Toastr::success('Success', 'User Updated Successfully');
        } catch (\Throwable $th) {
            Toastr::error('Error', 'Something Went Wrong');
            return back();
        }

        // Redirect to the index page with a success message.
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {

        $user = User::find($id);

        try {
            // Delete the user from the database.
            $user->delete();

            Toastr::success('Success', 'User Deleted Successfully');
        } catch (\Throwable $th) {
            Toastr::error('Error', 'Something Went Wrong');
        }

        return redirect()->route('user.index');
    }
}
