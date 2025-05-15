<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        return view('admin.user.index', ['title' => 'User Accounts', ]);
    }
}
