<?php

namespace App\Http\Controllers;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::latest()->paginate(10);

        return view('admin.home.dashboard', compact('users'));
    }
    public function user()
    {
        $users = User::latest()->paginate(10);

        return view('admin.user.index', compact('users'));
    }
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.show', compact('user'));
    }
}