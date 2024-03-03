<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("admin.panel", compact("users"));
    }

    public function promote($user_id)
    {
        $_user2_be_promote = User::find($user_id);
        if ($_user2_be_promote) {
            $_user2_be_promote->role = "admin";
            $_user2_be_promote->save();
            return redirect()->back()->with('success', 'User promoted successfully.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }

    public function delete_user($user_id)
    {
        $_user_to_delete = User::find($user_id);
        if ($_user_to_delete == auth()->user()) {
            return redirect()->back()->with('error', 'U can delete the login user');
        } else if ($_user_to_delete) {
            $_user_to_delete->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }
}
