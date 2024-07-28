<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\User;


class UserController extends Controller
{
    public function usersList()
    {
        $users = User::all();
        $roles = Role::all();
        return view('user.users', ['users' => $users, 'roles' => $roles]);
    }

    public function storeUser(Request $request)
    {
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'phoneNumber' => request('phoneNumber'),
            'password' => request('password'),
        ]);



        return back()->with('success', 'New user has been added successfully.');
    }

    public function userDetails($id)
    {
        $user = User::where('id', $id)->first();
        // dd( $user);

        $user_roles = UserRole::where('sid', $user->id)->get();
         //dd( $user_roles);

        $rolesArray = array();

        foreach ($user_roles as $user_role) {
            $actualRole = Role::select('roleName')->where('id', $user_role->rid)->first();
            if ($actualRole != null) {
                $rolesArray[] = $actualRole->roleName;
            }
        }


        //  dd($rolesArray);

        return view('user.user-details', ['user' => $user, 'actualRoles' => $rolesArray]);
    }
}
