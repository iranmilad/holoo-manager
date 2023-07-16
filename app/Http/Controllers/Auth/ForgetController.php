<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;

class ForgetController extends Controller
{
    public function forget(Request $request)
    {
        $request->validate([
          'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors([
                'users' => 'The provided model is incorrect.',
            ]);
        }

        $user->remember_token = Str::random(8);
        $user->save();

        $status = Password::sendResetLink(
                $request->only('email'), ['token' => $user->remember_token]
            );

        return $status === Password::RESET_LINK_SENT
             ? back()->with(['status' => __($status)])
             : back()->withErrors(['email' => __($status)]);
    }


    public function addNewPassword(Request $request)
    {
        $request->validate([
          'password' => 'required|confirmed|min:6',
          'remember_token' => 'required|min:8',
        ]);

        $user = User::where('remember_token', $request->remember_token)->first();
        if (!$user) {
            return back()->withErrors([
                'users' => 'The provided model is incorrect.',
            ]);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        return back()->with('status', 'Password updated successfully.');
    }


    public function validateRecoveryLink(Request $request)
    {
        $request->validate([
          'token' => 'required',
        ]);

        $user = User::where('remember_token', $request->token)->first();
        if (!$user) {
            return back()->withErrors([
                'token' => 'The provided token is invalid.',
            ]);
        }

        return view('new_password')->with('token', $request->token);
    }
}
