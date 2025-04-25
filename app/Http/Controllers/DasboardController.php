<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DasboardController extends Controller
{
    //dashboard page
    public function index() {
        return view('dashboard.index', ['title' => 'Dashboard']);
    }

    //profile page
    public function profile() {
        return view('dashboard.profile', [
            'title' => 'Profile',
            'user' => Auth::user()]
        );
    }
}
