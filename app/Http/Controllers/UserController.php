<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\User;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index()
    {
        $users=User::all();
        return View::make('users.all_users')->with('users',$users);
    }

    public function newUser(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|string|email|max:255|unique:users',
            'user_level'=>'required',
            'password'=>'required|string|min:6|confirmed'
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //add new user
        $data=new User();
        $data->name=$request->input('name');
        $data->email=$request->input('email');
        $data->user_level=$request->input('user_level');
        $data->password=bcrypt($request->input('password'));
        $data->save();

        return redirect()->back();
    }

    public function deleteUser(Request $request)
    {
        //get the user from the DB
        //ensure user does not delete his/her account
        if ($request->input('user_to_delete_id')==Auth::user()->id){
            return Response::json([
               'status1'=>'You cannot delete your own account'
            ]);
        }
        User::find($request->input('user_to_delete_id'))->delete();

        return Response::json([
            'result1'=>$request->all(),
            'status1'=>'The User Has been Deleted'
        ]);

    }

    public function allRoles(Request $request)
    {
        return Response::json([
           'res34'=>$request,
           'roles'=>Role::all()
        ]);
    }

    public function attachRole(Request $request)
    {
        $user=User::find($request->input('user_id'));
        $role=Role::find($request->input('role_id'));
        $user->attachRole($role);

        return Response::json([
            'success'=>'Role successfully attached'
        ]);
    }
}
