<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getUsers(){

        $users = User::all();
        $roles = Role::all();
        return view('backoffice.users' , compact('users' , 'roles'));
    }

    public function updateUser(Request $request , $id){

        $user=User::find($id);
        $user->roles()->sync($request->role);
        return redirect()->back();
    }
}
