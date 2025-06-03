<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

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

    /**
     * Show the confirm password view.
     */
    public function passwordReset(String $token) {
        return view('password.reset', [
            'title' => 'Confirm Password',
            'token' => $token
        ]);
    }

    /**
     * Confirm the user's password.
     */
    public function confirmPassword(Request $request) {
        //validate input
        $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PasswordReset
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
    }

}
