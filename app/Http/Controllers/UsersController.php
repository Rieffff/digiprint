<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\ClassLevel;

class UsersController extends Controller
{
    public function index()
    {
        // Use the 'leftJoin' method to perform SQL LEFT JOINs between 'users', 'class_levels', and 'roles' tables
        $users = User::leftJoin('class_levels', 'users.id_cl', '=', 'class_levels.cl_id')
            ->leftJoin('roles', 'users.id_role', '=', 'roles.role_id')
            ->select('users.*', 'class_levels.cl_name', 'roles.role_name')
            ->get();

        return view('users.index', compact('users'));
    }



    public function create()
    {
        // If you need to fetch any additional data for the form, you can do it here.
        // For example, if you want to display class_levels data in a dropdown, you can fetch it like this:
        // $classLevels = \App\Models\ClassLevel::all();
        $roles = Role::all();
        $classLevels = ClassLevel::all();
        return view('users.create', compact('roles', 'classLevels')); // Pass any additional data you need to the view, if necessary.
    }

    public function store(Request $request)
    {
        // Create a new user and set its properties
        $user = new User();
        $user->name = $request->input('name');

        $user->alamat = $request->input('alamat');
        $user->noHp = $request->input('noHp');

        if ($request->has('email_input')) {
            $user->email = $request->input('email_input');
        }

        $user->id_role = $request->input('id_role');

        if ($request->has('id_cl')) {
            $user->id_cl = $request->input('id_cl');
        }

        if ($request->has('acc_class')) {
            $user->acc_class = $request->input('acc_class');
        }

        $user->acc_gender = $request->input('acc_gender');

        // Check if the password is provided and hash it before storing it
        if ($request->has('password_input')) {
            $user->password = bcrypt($request->input('password_input'));
        }

        // Save the user to the database
        $user->save();

        // Redirect back to the index page with a success message
        return redirect()->route('users.index')->with('success', 'New user added successfully.');
    }

    public function destroy($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
