<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('tasks.index'); // Redirect to the tasks route
        }

        return view('user.profile', compact('user'));
    }
}
