<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RolesPermissionController extends Controller
{
    //
    public function allRoles()
    {
        $roles=Role::all();
        return View::make('roles_permission.roles')->withRoles($roles);
    }

    public function newRole(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'display_name'=>'required',
            'description'=>'required'
        ]);

        $new=new Role();
        $new->name=$request->input('name');
        $new->display_name=$request->input('display_name');
        $new->description=$request->input('description');
        $new->save();

        return redirect()->back();
    }

    public function deleteRole($id)
    {
        Role::destroy($id);
        return redirect()->back();
    }

    public function allPermissions()
    {
        $permissions=Permission::all();
        return View::make('roles_permission.permissions')->withPermissions($permissions);
    }

    public function newPermision(Request $request)
    {
            $this->validate($request,[
                'name'=>'required',
                'display_name'=>'required',
                'description'=>'required'
            ]);

            $perm=new Permission();
            $perm->name=$request->input('name');
            $perm->display_name=$request->input('display_name');
            $perm->description=$request->input('description');
            $perm->save();

            return  redirect()->back();
    }

    public function deletePermission($id)
    {
        Permission::destroy($id);
        return redirect()->back();
    }
}
