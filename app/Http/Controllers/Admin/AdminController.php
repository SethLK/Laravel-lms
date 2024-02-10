<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        if($_user2_be_promote){
            $_user2_be_promote->role = "admin";
            $_user2_be_promote->save();
            return redirect()->back()->with('success', 'User promoted successfully.');
        }else {
            return redirect()->back()->with('error', 'User not found.');
        }

    }
}
