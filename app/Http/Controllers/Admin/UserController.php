<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::where('status', 0)->get(); // Fetch pending users
        return view('admin.users.index', compact('users'));
    }

    public function approve(User $user)
    {
        $user->status = User::STATUS_APPROVED; // Approve the user
        $user->save();

        // Optionally notify the user about approval

        return redirect()->route('admin.users.index')->with('success', 'User approved.');
    }

    public function reject(User $user)
    {
        $user->status = User::STATUS_REJECTED; // Reject the user
        $user->save();

        // Optionally notify the user about rejection

        return redirect()->route('admin.users.index')->with('success', 'User rejected.');
    }
}
