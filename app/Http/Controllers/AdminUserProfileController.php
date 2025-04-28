<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AdminUserProfileController extends Controller
{
    //gate user profile
    public function __construct()
    {
        // Apply the 'admin' middleware to all methods in this controller
        $this->middleware('admin');
    }

    //table users
    public function index() {
        $users = User::all();
        return view('admin.user.index', [
            'title' => 'User Accounts',
            'users' => $users
        ]);
    }
}
