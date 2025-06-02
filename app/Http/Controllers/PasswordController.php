<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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

    /**
     * Handle an incoming password reset link request.
     */
    public function passwordEmail(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);

        //send link to reset password
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT 
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);
    }

}
