<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('user.roles', ['roles' => $roles]);
    }


    public function storeRole(Request $request)
    {
        Role::create([
            'roleName' => request('roleName'),
            'description' => request('roleDescription'),

        ]);
        return back()->with('success', 'New role has been added successfully.');
    }

    
    public function destroy($id)
    {
        Role::find($id)->delete();
        return back()->with('success', 'The role has been deleted successfully.');
    }

    public function assignRoletoUser(Request $request)
    {
       
        //  dd(request('user_id'));
        // UserRole::create ([
        //     'sid' => request('user_id'),
        //     'rid' => request('role_id')
        // ]);
        $userRole = new UserRole();
        $userRole->sid = request('user_id');
        $userRole->rid = request('role_id');
        $userRole->save();
        return back()->with('success', 'The role has been added successfully.');
    }
}
