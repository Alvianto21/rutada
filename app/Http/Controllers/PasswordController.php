<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function forgetPassword() {
        return view('password.forget', [
            'title' => 'Forget Password'
        ]);
    }

}
