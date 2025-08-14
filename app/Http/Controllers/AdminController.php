<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
   public function manageUsers() {
    $users = User::all();  // exclude admins
    return view('admin.users', compact('users'));
}

public function deleteUser($id) {
    $user = User::findOrFail($id);

    if ($user->role === 'admin') {
        return back()->with('error', 'You cannot delete another admin.');
    }

    $user->delete();
    return back()->with('success', 'User deleted successfully.');
}
}
