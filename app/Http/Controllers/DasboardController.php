<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DasboardController extends Controller
{
    // dashboard page
    public function index()
    {
        return view('dashboard.index', ['title' => 'Dashboard', 'user' => Auth::user()]);
    }

    // profile page
    public function profile()
    {
        return view(
            'dashboard.profile',
            [
                'title' => 'Profile',
                'user' => Auth::user()
            ]
        );
    }

    // token page generator
    public function token(Request $request)
    {
        // check if user is andmin
        Gate::authorize('admin');

        // check if user already has token
        $existingToken = $request->user()->tokens()->where('name', 'API_token')->first();

        if ($existingToken) {
            // show if token already exist
            $token = $existingToken->plainTextToken ?? $existingToken->token;
        } else {
            // generate token
            $token = $request->user()->createToken('API_token')->plainTextToken;
        }

        // return view with token
        return view('dashboard.token', [
            'title' => 'Your API Token',
            'token' => $token
        ]);
    }
}
