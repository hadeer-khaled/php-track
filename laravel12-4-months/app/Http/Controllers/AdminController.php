<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function usersList()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }




    public function changeUserRole(Request $request ,User $user){
        $user->is_admin = !$user->is_admin;
        $user->save();

        $users = User::all(); // Refresh the users list after role change

        return redirect()->route('admin.users.index', compact('users') )->with('success', 'User role updated successfully.');
    }
}
