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
    public function index(Request $request) {
        //get search query
        // if ($request->has('search')) {
        //     $search = $request->query('search');
        //     //search users
        //     $users = User::search($search)->paginate(10)->withQueryString();
        // }
        // else {
        //     $users = User::paginate(10)->withQueryString();
        // }

        return view('admin.user.index', [
            'title' => 'User Accounts',
        ]);
    }
}
